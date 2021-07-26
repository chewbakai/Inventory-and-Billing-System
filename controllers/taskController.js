const client = require("../models/client");

exports.getClient = (req, res) =>{ 
    if(req.session.code){
        client.model.findAll({
            where:{ account_uuid: req.session.code
            }
        }).then(clients =>{
            req.session.clients = clients;
            if(clients){
                res.render("home",{username: req.session.userName,code: req.session.code, clients:req.session.clients,loggedIn:req.session.loggedIn});
            }
        })
    }else{
        res.redirect("/");
    }
}

exports.makeClient = (req, res) =>{
    if(req.session.code){
        res.render("createClient",{username: req.session.userName,code: req.session.code, clients:req.session.clients,loggedIn:req.session.loggedIn});
    }else{
        res.redirect("/");
    }
}

exports.createClient = async (req, res) => {

    if(req.session.code){
        let result = await client.model.create({
            account_code: req.session.code, 
            client_name: req.query.client,
            description: req.query.desc,
            status: "pending"
        })
        if(!result){
            res.render("/createClient",{username: req.session.userName,code: req.session.code, clients:req.session.clients,loggedIn:req.session.loggedIn});
        }else{
            res.redirect("/client");
        }
    }else{
        res.redirect("/");
    }
}

exports.updateClient = async (req, res) => {   

    if(req.session.code){
        let result = await client.model.update({status:"completed"} ,
        {
            where:{
                id: req.query.id
            }
        })
        if(!result){

        }else{
            res.redirect("/client");
        }
    }else{
        res.redirect("/");
    }
}

exports.deleteClient = async (req, res) => {
    if(req.session.code){
        await client.model.destroy({
            where: {
                id: req.query.id
            }
        }).then(result => {
            if(result){
                res.redirect("/client");
            }else{
                res.redirect("/client");
            }
        })
    }else{
        res.redirect("/");
    }
}