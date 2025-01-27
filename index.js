  
    const express = require('express');
const mongoose = require('mongoose');
const User = require('./models/userModel');
const cors = require('cors');
const Vouchers = require('./models/voucherModel');

// Connect to MongoDB
mongoose.connect('mongodb://localhost:27017/users')
  .then(() => {
    console.log("Database connection successful..");
  })
  .catch((err) => {
    console.log("Database connection failed :=> ", err);
  });

const app = express();
app.use(cors());
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(express.static('public'))
app.set('view engine','ejs')
app.set('views','./views')

// User sign-up route
app.post("/api/signUp", (req, res) => {
    const username = req.body.name
    const email = req.body.email
    const passCre = req.body.create
    const passConfi = req.body.confirm
    const role = req.body.role
    if (!username || !email || !passConfi || !passCre || !role ) {
      return res.status(400).json({ message: "All fields are required" });
    }
    if(passConfi !== passCre){
        res.status(400).json({
            message:'passwords don"t match'
        })
    }else{
        const password = passConfi;
        User.create({
            username,
            password,

            email,
            role
        })
        .then((result)=>{
            console.log(result);
            res.status(200).json({message: "User Created",username});
        })
        .catch((err)=>{
            console.log(err);
            res.status(500).json({message: "User Creation failed",username});
        })
    }
  });

app.post("/api/login", (req,res)=>{
    const email = req.body.email;
    const password = req.body.password;
    console.log(email,password);
    User.find({email,password})
    .then((result)=>{
        console.log(result);
        if(result.length===0){
            res.status(404).json({message:"User Not Found"});
        }
        else{
            res.redirect("/emp_dashboard");
        }
    })
    .catch((err)=>{
        console.log(err);
        res.status(500).json({message:"Server Down"});
    })
});
app.post("/api/voucher_entry", (req, res) => {
    const date = req.body.voucherDate
    const category = req.body.category
    const amount = req.body.amount
    const description = req.body.description
    console.log(date,category,amount,description);
    if (!date || !category || !amount || !description){
        return res.status(400).json({ message: "All fields are required" });
    }
    else{
        Vouchers.create({
            date,category,amount,description
        })
        .then((result)=>{
            console.log(result);
            //res.redirect()
            res.status(200).json({
                message:'OK'
            });
        })
        .catch((err)=>{
            console.log(err);
            res.status(500);
        })
    }
});

// Sample endpoint to check server status
app.get('/', (req, res) => {
    res.render('index');
});
app.get('/login', (req, res) => {
    res.render('login');
});
app.get('/signup', (req, res) => {
    res.render('signUp');
});
app.get('/profile', (req, res) => {
    res.render('profile');
});
app.get('/voucher_entry', (req, res) => {
    res.render('voucher_entry');
});
app.get('/voucher_status', (req, res) => {
    res.render('voucher_status');
});
app.get('/admin_dashboard', (req, res) => {
    res.render('admin_dashboard');
});
app.get('/admin_managevouch', (req, res) => {
    res.render('admin_managevouch');
});
app.get('/admin_overview', (req, res) => {
    res.render('admin_overview');
});
app.get('/admin_settings', (req, res) => {
    res.render('admin_settings');
});
app.get('/admin_teams', (req, res) => {
    res.render('admin_teams');
});
app.get('/draft_voucher', (req, res) => {
    res.render('draft_voucher');
});
app.get('/emp_dashboard', (req, res) => {
    res.render('emp_dashboard');
});

const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});