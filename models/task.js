const {DataTypes} = require("sequelize");
const db = require("../connection");

const clients = db.sequelize.define("clients", {
    id: {
        type: DataTypes.BIGINT,
        autoIncrement: true,
        allowNull: true,
        primaryKey: true
      },
      account_uuid:{
        type: DataTypes.STRING,
        allowNull: false,
      },
      client_name:{
        type: DataTypes.STRING,   
        allowNull: false,
      },
      description: {
        type: DataTypes.STRING
      },
      status: {
        type: DataTypes.ENUM('pending', 'completed')
      },
      createdAt: {
        type: DataTypes.DATE,
        allowNull:false
      },
      updatedAt: {
        type: DataTypes.DATE
      },
      deletedAt: {
        type: DataTypes.DATE
      }
});

exports.model = clients;