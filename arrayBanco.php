<?php
/* me leia antes 
DESCRIÇÃO: 
Aqui pego um array e insiro ele no banco 
////ESTRUTURA DO BANCO////
NOME: testearray
TABELA: dados
COLUNAS: id(int 11 AI) info (text)
//////////////////////////
DESCRIÇÃO DO CODIGO

Aqui crio um array com as informações que quero, mas terei que converte-lo para enviar para o banco.
serialize(array): Converte em um estado que fica salvo no banco
unserialize(array): Converte novamente para o estado de array
var_dump(array): Permite exibir todos os dados do array.... mas não da para utilizar no banco.
*/




function dadosdeAcessoBD()
{
    if (!defined("HOST"))
        define("HOST", "localhost");
    if (!defined("BANCO"))
        define('BANCO', 'testearray');
    if (!defined("USUARIO"))
        define('USUARIO', 'root');
    if (!defined("SENHA"))
        define('SENHA', "");

}

dadosdeAcessoBD();
$conn = new mysqli(HOST, USUARIO, SENHA, BANCO);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$testeArray = array(
    "https://www.healthifyme.com/blog/wp-content/uploads/2021/08/How-to-Measure-Your-Height.jpg",
    "https://img.quizur.com/f/img605a0e64bb91e7.52520571.jpg?lastEdited=1616514665",
    "https://paginalixo.com/wp-content/uploads/2019/10/aleatorio.jpg",
    "dado 4",
    " dado 5",
    " dado 6",
    " dado 7",
    " dado 8",
    " dado 9",
    " dado 10",
    " dado 11",
    " dado 12",
    " dado 13 ",
    " dado 14",
    "dado 15",
    "dado 16",
    " dado 17",
    "dado 18",
    " dado 19",
    " dado 20",
    " dado 21",
    " dado 22",
    " dado 23",
    " dado 24",
    " dado 25",
    " dado 26",
    " dado 27 ",
    " dado 28"
);

//echo $testeArray[0];
//echo var_dump($testeArray);
//echo serialize($testeArray);

echo "<h1>Atualizando os dados </h1>";
$atualiza = "2";

if ($atualiza == "2") {

    //$dadoNovo= var_dump($testeArray);
    $dadoNovo = serialize($testeArray);
    $SessaoID = "UPDATE dados SET info='$dadoNovo' WHERE id=1 ";
    if ($conn->query($SessaoID) === TRUE) {
        echo "atualizou";
    } else {
        echo "não enviou";
    }
} else {
    echo "sem atualização";
}

echo "<h1>puxando os dados </h1>";
$sql = "SELECT info FROM dados WHERE id=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pegaDado = $row["info"];
    }
} else {
    echo "não carregou";
}

$dadodeVolta = unserialize($pegaDado);
//echo $dadodeVolta[25];

$tamanhoArray= count($dadodeVolta);
$contador = 0;
while($contador < $tamanhoArray)
{
echo "<div> <img src=".$dadodeVolta[$contador]." height='50px'></div>";
$contador++;
}






$conn->close();

?>