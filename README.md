 Criar um banco de dados chamado "uniasselvi" no MySQL;
 criar as tabela com nome "funcionario";
 idfuncionario pk int,
 nome,
 cargo, 
 descricao_do_cargo, 
 setor, 
 salario;
 * TODO fazer o banco de dados pelo mysql




* TODO - Verificar algumas informações por este link [Manipulando dados com radio-button-com-php](http://devfuria.com.br/php/manipulando-radio-button-com-php/)

# Cargos em uma empresa
- Estagiário 
- Auxiliar
- Assistente
- Técnico 
- Trainee 
- Analista 
- Encarregado 
- Coordenador/ Supervisor 
- Gerente 
- Diretor
- Presidente 

# Setores de cargo em uma empresa 
- Setor Administrativo
- Setor Financeiro
- Setor de Recursos Humanos (RH)
- Setor Comercial
- Setor Operacional ou de Produção
- Setor de Tecnologias da Informação (TI)


Claro, vou fornecer informações sobre os salários médios para os cargos que você mencionou. Lembre-se de que os salários podem variar dependendo da região, setor e tamanho da empresa. Vamos lá:

Estagiário: Os estagiários geralmente recebem uma bolsa-auxílio, que pode variar amplamente. Em média, o salário de um estagiário no Brasil pode variar de R$ 800 a R$ 1.500 por mês.
Auxiliar: O salário de um auxiliar também varia, mas em média, pode ser em torno de R$ 1.200 a R$ 2.000 mensais.
Assistente: Para assistentes, o salário médio pode variar de R$ 1.500 a R$ 3.000 por mês, dependendo da experiência e do setor.
Técnico: Técnicos costumam receber um pouco mais. O salário médio para técnicos no Brasil pode variar de R$ 2.000 a R$ 4.000 mensais.
Trainee: Trainees são geralmente recém-formados e recebem um salário competitivo. Em média, o salário de um trainee pode variar de R$ 2.500 a R$ 5.000 por mês.
Analista: Analistas têm uma ampla faixa salarial, dependendo da especialização e do nível de experiência. O salário médio para analistas no Brasil pode variar de R$ 3.000 a R$ 6.000 mensais.
Encarregado: Encarregados ou supervisores podem ganhar em média de R$ 3.500 a R$ 7.000 por mês.
Coordenador/Supervisor: Coordenadores e supervisores têm responsabilidades maiores e, portanto, seus salários também são mais altos. A média pode variar de R$ 4.000 a R$ 8.000 mensais.
Gerente: Gerentes têm uma faixa salarial ampla, dependendo do tamanho da empresa e da área de atuação. O salário médio para gerentes no Brasil pode variar de R$ 5.000 a R$ 12.000 por mês.
Diretor: Diretores ocupam cargos de alto escalão e, portanto, seus salários são substanciais. A média para diretores pode variar de R$ 10.000 a R$ 25.000 mensais.
Presidente: O presidente de uma empresa é o cargo mais alto e, portanto, seus salários são significativamente maiores. A média para presidentes pode variar de R$ 20.000 a R$ 50.000 por mês.
Lembrando que esses valores são apenas médias e podem variar consideravelmente com base na localização geográfica, setor de atuação e porte da empresa.



![Logo](https://portal.uniasselvi.com.br/public/img/site/logo-horizontal_desk.png)
![Homepage](assets/img/homepage.png)
![Cadastro](assets/img/cadastro_homepage(1).png)
![Consulta](assets/img/consulta_homepage.png)
![Atualizar](assets/img/homepage_atualizar.png)



## Informações para voce criar o seu banco de dados

CREATE SCHEMA `uniasselvi` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;



CREATE TABLE `uniasselvi`.`funcionario` (
  `idfuncionario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `cargo` VARCHAR(45) NULL,
  `descricao_do_cargo` VARCHAR(255) NULL,
  `setor` VARCHAR(45) NULL,
  `salario` VARCHAR(20) NULL,
  PRIMARY KEY (`idfuncionario`));


## Ao final de tudo, seu app funcionará, mas com erro na senha do banco de dados dos arquivos: 
- conexao.php (/util/conexao.php). Coloque a senha do seu banco de dados, se houver
- insert_cadastro.php (/util/insert_cadastro.php). Coloque a também do seu banco de dados, se houver.