package ru.absolutebalance.common

import android.os.Parcel
import android.os.Parcelable
import com.google.gson.annotations.SerializedName

class LoginResponseVO() : Parcelable {
    @SerializedName("message")
    var message: String? = null

    @SerializedName("status")
    var status: Int? = null

    @SerializedName("list_date")
    var dates: List<String>? = null

    @SerializedName("user_id")
    var userId: Int? = null

    constructor(parcel: Parcel) : this() {
        message = parcel.readString()
        status = parcel.readValue(Int::class.java.classLoader) as? Int
        dates = parcel.createStringArrayList()
        userId = parcel.readValue(Int::class.java.classLoader) as? Int
    }

    override fun writeToParcel(parcel: Parcel, flags: Int) {
        parcel.writeString(message)
        parcel.writeValue(status)
        parcel.writeStringList(dates)
        parcel.writeValue(userId)
    }

    override fun describeContents(): Int {
        return 0
    }

    companion object CREATOR : Parcelable.Creator<LoginResponseVO> {
        override fun createFromParcel(parcel: Parcel): LoginResponseVO {
            return LoginResponseVO(parcel)
        }

        override fun newArray(size: Int): Array<LoginResponseVO?> {
            return arrayOfNulls(size)
        }
    }
}
