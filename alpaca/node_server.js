let WSClient = null;
let NetcatClient = null;

const initNetCatSocket = () => {
    const NClient = require("netcat/client");

    const isConnect = () => {
        console.log("connect to netcat");
    };

    NetcatClient = new NClient();

    NetcatClient.addr("127.0.0.1").port(9876).connect();

    NetcatClient.on("connect", isConnect);

    NetcatClient.on("error", function (err) {
        throw new Error(err);
    });

    NetcatClient.on("data", function (msg) {
        strmsg = msg.toString();
        // process.stdout.write(strmsg);
        WSClient.send(strmsg);
        // if (strmsg[strmsg.length - 2] === ">") {
        //     NetcatClient.close();
        // }
    });
};

const initWebSocket = () => {
    const WebSocket = require("ws");
    const wsServer = new WebSocket.Server({ port: 9000 });
    const onConnect = (client) => {
        WSClient = client;
        WSClient.on("message", async function (message) {
            console.log("message", message.toString());
            NetcatClient.send(
                `Расскажи, пожалуйста, товар ${message.toString()} на русском языке\n`
            );
        });
        WSClient.on("close", function () {
            console.log("Пользователь отключился");
        });
    };

    wsServer.on("connection", onConnect);
};

initNetCatSocket();
initWebSocket();
