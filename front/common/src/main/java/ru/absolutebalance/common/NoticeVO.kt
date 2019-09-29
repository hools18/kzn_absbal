package ru.absolutebalance.common

import android.os.Parcel
import android.os.Parcelable
import com.google.gson.annotations.SerializedName

class NoticeVO() : Parcelable {

    @SerializedName("operation_id")
    var operationId: Int? = null

    @SerializedName("contract_id")
    var contractId: Int? = null

    @SerializedName("created_at")
    var date: String? = null

    constructor(parcel: Parcel) : this() {
        operationId = parcel.readValue(Int::class.java.classLoader) as? Int
        contractId = parcel.readValue(Int::class.java.classLoader) as? Int
        date = parcel.readString()
    }

    override fun writeToParcel(parcel: Parcel, flags: Int) {
        parcel.writeValue(operationId)
        parcel.writeValue(contractId)
        parcel.writeString(date)
    }

    override fun describeContents(): Int {
        return 0
    }

    companion object CREATOR : Parcelable.Creator<NoticeVO> {
        override fun createFromParcel(parcel: Parcel): NoticeVO {
            return NoticeVO(parcel)
        }

        override fun newArray(size: Int): Array<NoticeVO?> {
            return arrayOfNulls(size)
        }
    }
}
