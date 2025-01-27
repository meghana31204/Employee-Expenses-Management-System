const userModel = require('../models/userModel');

const addUser = async (req, res) => {
  try {
    const newUser = new userModel({
      username: req.body.name,
      email: req.body.email,
      password: req.body.password,
    });

    await newUser.save();
    console.log('User added successfully');
    res.status(200).send({ message: 'User added successfully' });
  } catch (err) {
    console.error('Error adding user:', err.message);
    res.status(500).send({ message: 'Failed to add user' });
  }
};

module.exports = { mongoConnect, addUser };