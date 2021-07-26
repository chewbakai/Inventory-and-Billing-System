const express = require("express");
const router = express.Router();
const clientController = require("../controllers/clientController");

router.get("/", clientController.getClient);
router.get("/make_client", clientController.makeClient);
router.get("/create_client", clientController.createClient);
router.get("/update_client", clientController.updateClient);
router.get("/delete_client", clientController.deleteClient);

module.exports = router;