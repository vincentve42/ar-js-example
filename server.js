const express = require("express");
const app = express();

app.get("/", (req, res) => {
    res.send("<h1>Hello, Express.js Server!</h1>");
});

const port = process.env.PORT || 1234; // You can use environment variables for port configuration
server.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
