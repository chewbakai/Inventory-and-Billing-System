require("dotenv").config();
const { Sequelize } = require("sequelize");
const sequelize = new Sequelize(
	"billingsystem",
	"root",
	null,
	{
		host: "localhost",
		dialect: "mysql",
		define: {
			paranoid: true,
		},
	}
);

try {
	sequelize.authenticate();
	console.log("Connection has been established successfully.");
} catch (error) {
	console.error("Unable to connect to the database:", error);
}

module.exports = sequelize;
