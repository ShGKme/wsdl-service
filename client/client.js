const DateArg = require("./DateArg");
const soap = require('soap');
const inquirer = require('inquirer');

const url = "https://shagrisha.azurewebsites.net/wsdl-service/server.php?wsdl";

const dateQuestion = [{
        type: 'input',
        name: "day",
        message: "Day: ",
    }, {
        type: 'input',
        name: "month",
        message: "Month: ",
    }, {
        type: 'input',
        name: "year",
        message: "Year: ",
    }];

inquirer
    .prompt(dateQuestion)
    .then(answers => {
        return soap.createClientAsync(url);
    }).then(client => {
        return client.ShouldIGoToUniverAsync({DateArg: new DateArg(answers.day, answers.month, answers.year));
    }).then(result => {
        console.log(result.return.$value);
    }).catch(e => {
        console.log("Check the URL and internet connection!");
        console.log(e.message);
    });