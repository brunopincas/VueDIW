const express = require("express");
const cors = require("cors");
const app = express();

app.use(cors());

app.listen(3000, function () {
  console.log("CORS-enabled server listening on port 3000");
});