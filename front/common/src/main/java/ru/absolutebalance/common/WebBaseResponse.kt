package ru.absolutebalance.common

import android.os.Parcel
import android.os.Parcelable
import com.google.gson.annotations.SerializedName

class WebBaseResponse() : Parcelable {
    @SerializedName("status")
    var status: Int? = null

    @SerializedName("message")
    var message: String? = null

    @SerializedName("content")
    var content: List<NoticeVO>? = null

    constructor(parcel: Parcel) : this() {
        status = parcel.readValue(Int::class.java.classLoader) as? Int
        message = parcel.readString()
    }

    override fun writeToParcel(parcel: Parcel, flags: Int) {
        parcel.writeValue(status)
        parcel.writeString(message)
    }

    override fun describeContents(): Int {
        return 0
    }

    companion object CREATOR : Parcelable.Creator<WebBaseResponse> {
        override fun createFromParcel(parcel: Parcel): WebBaseResponse {
            return WebBaseResponse(parcel)
        }

        override fun newArray(size: Int): Array<WebBaseResponse?> {
            return arrayOfNulls(size)
        }
    }
}
