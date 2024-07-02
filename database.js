const mysql = require('mysql')

var con = mysql.createConnection({
    host: "localhost",
    port:  "",
    user: "root",
    password: "password",
    db : "focus"

})

con.connect(function(err){
    if(err) console.log("Error")
})

function Upload(){
    con.query("INSERT INTO data (img,vid) VALUES ('1','2')", function(err,result){
        if (err) console.log(err)
        console.log(result)
    })
}
function Login(){
    var u = document.getElementById("u").value
    var p = document.getElementById("pwd").value

    
}
