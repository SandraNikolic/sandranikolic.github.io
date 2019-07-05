const fs = require('fs');
const http = require('http');
const url = require('url');

const json = fs.readFileSync(`${__dirname}/data/data.json`, 'utf-8');
const fruitData = JSON.parse(json);

// Creating server
const server = http.createServer((req, res) => {
    
    const pathName = url.parse(req.url, true).pathname;
    const id = url.parse(req.url, true).query.id;

    // Create routing
    // Products overview
    if(pathName === '/products' || pathName === '') {
        //console.log('Somenone did access the server!');
        res.writeHead(200, {'Content-type': 'text/html'})
        
        fs.readFile(`${__dirname}/templates/template-overview.html`, 'utf-8', (err, data) => {
            let output = data;
            fs.readFile(`${__dirname}/templates/template-card.html`, 'utf-8', (err, data) => {
                const cardsOutput = fruitData.map(el => replaceTemplate(data, el)).join('');
                output = output.replace('{%CARDS%}', cardsOutput);
                res.end(output);
            });
        });
        }

        
    // Fruit details
    else if(pathName === '/fruits' && id < fruitData.length) {
        //console.log('Somenone did access the server!');
        res.writeHead(200, {'Content-type': 'text/html'});
        
        fs.readFile(`${__dirname}/templates/template-fruit.html`, 'utf-8', (err, data) => {
            let fruit = fruitData[id];
            const output = replaceTemplate(data, fruit);
            res.end(output);
        });
    }
    // Images routing
    else if ((/\.(jpg|jpeg|png|gif)$/i).test(pathName)) {
        fs.readFile(`${__dirname}/data/img${pathName}`, (err, data) => {
            res.writeHead(200, { 'Content-type': 'image/jpg'});
            res.end(data);
        });
    }
    // URL not found
    else {
        res.writeHead(404, {'Content-type': 'text/html'})
        res.end('URL was not found on the server');
    }
});

// Listening the server, port 1337, ip address 1.27.0.0.1
server.listen(1337, '127.0.0.1', () => {
    console.log('Listening for requests now')
});

// Creating reusable function for data
function replaceTemplate(orginalHtml, fruit) {
    let output = orginalHtml.replace(/{%PRODUCTNAME%}/g, fruit.productName);
    output = output.replace(/{%IMAGE%}/g, fruit.image);
    output = output.replace(/{%PRICE%}/g, fruit.price);
    output = output.replace(/{%FAMILY%}/g, fruit.family);
    output = output.replace(/{%VITAMINS%}/g, fruit.vitamins);
    output = output.replace(/{%DESCRIPTION%}/g, fruit.description);
    output = output.replace(/{%ORIGINCOUNTRY%}/g, fruit.originCountry)
    output = output.replace(/{%ID%}/g, fruit.id);
    output = output.replace(/{%SOURCE%}/g, fruit.source);
    return output;
}

