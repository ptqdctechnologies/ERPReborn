//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//Packages
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
const os = require('os');
const path = require('path');
const cors = require('cors');
const express = require("express");
const bodyParser = require('body-parser');

const swaggerJsdoc = require('swagger-jsdoc');
const swaggerUi = require('swagger-ui-express');
const postmanToOpenApi = require('postman-to-openapi')
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
const swaggerJson = require('./openapi.json');
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//CONFIG
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
const app = express();
const main_server_port = 9000;
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//EXPRESS MIDDLEWARE
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: false
}));
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//API DOCUMNETION
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
app.use('/api-docs', swaggerUi.serve, swaggerUi.setup(swaggerJson, false, {docExpansion: 'none'}));
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//JSON
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
app.get('/swagger-json', (req, res) => {
    res.setHeader('Content-Type', 'application/json');
    res.send(swaggerJson);
});
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//GENERATE YML
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
app.get('/generate-yml', async (req, res) => {
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // Postman Collection Path
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    const postmanCollection = 'collection.json'
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // Output OpenAPI Path
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    const outputFile = 'collection.yml'
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // Async/await
    ////++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    try {
        const result = await postmanToOpenApi(postmanCollection, outputFile, {
            defaultTag: 'General'
        })
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        // Without save the result in a file
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        const result2 = await postmanToOpenApi(postmanCollection, null, {
            defaultTag: 'General'
        })
        console.log(`OpenAPI specs: ${result}`)
    } catch (err) {
        console.log(err)
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // Promise callback style
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // postmanToOpenApi(postmanCollection, outputFile, {
    //         defaultTag: 'General'
    //     }).then(result => {
    //         console.log(`OpenAPI specs: ${result}`)
    //     }).catch(err => {
    //         console.log(err)
    //     })
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // Command Line
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //Comments-  p2o ./path/to/PostmantoCollection.json -f ./path/to/result.yml -o ./path/to/options.json
});
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//SERVER
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
app.listen(main_server_port, () => {
    //console.table(os);
    console.log('Example app listening at port: http://' + os.hostname() + ':' + main_server_port);
});