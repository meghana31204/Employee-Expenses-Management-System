const mongoose=require('mongoose');

const voucherSchema = new mongoose.Schema({
    date:{
        type: String,
        required: true,
    },
    category:{
        type: String,
        require: true,
    },
    amount:{
        type: Number,
        require: true,
    },
    description:{
        type: String,
        require: true,
    },
})

const Vouchers = mongoose.model('vocherEntry', voucherSchema);
module.exports = Vouchers;