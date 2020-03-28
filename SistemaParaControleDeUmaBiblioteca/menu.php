
				<ul>
                <li><a href="index.php">Inicio</a></li>
    <?php if($_SESSION['nivel_acesso']=='2' || $_SESSION['nivel_acesso']=='3')echo "
	<li><a href=\"index.php\">Empréstimo</a>
					<ul id=\"sub\"> 
                      <li><a href=\"index.php?acao=$CE\">Criar Empréstimo</a></li>
                      <li><a href=\"index.php?acao=$LCE\">Visualizar Empréstimos</a></li></ul>
				</li>
             	<li><a href=\"index.php?acao=$CD\">Devolução</a></li>"; 
	 if($_SESSION['nivel_acesso']=='3')echo "<li><a href=\"index.php\">Cadastro</a>
                    <ul id=\"sub\">
    				  <li><a href=\"index.php?acao=$CA\">Cadastro Autor</a></li>
                      <li><a href=\"index.php?acao=$CTA\">Cadastro Tipo Aquisição</a></li>
                      <li><a href=\"index.php?acao=$CED\">Cadastro Editora</a></li>
                      <li><a href=\"index.php?acao=$CU\">Cadastro Usuário</a></li>
                      <li><a href=\"index.php?acao=$CI\">Cadastro Idiomas</a></li>
                      <li><a href=\"index.php?acao=$CC\">Cadastro Cursos</a></li>
                      <li><a href=\"index.php?acao=$CTM\">Cadastro Tipos de Mídias</a></li>
                      <li><a href=\"index.php?acao=$CL\">Cadastro Livro</a></li>
                      <li><a href=\"index.php?acao=$CMD\">Cadastro Mídia</a></li>
                      <li><a href=\"index.php?acao=$CF\">Cadastro Folheto</a></li>
                      <li><a href=\"index.php?acao=$CT\">Cadastro de Textos</a></li>
                    </ul>
              </li>
              <li><a href=\"index.php\">Multa</a>
                    <ul id=\"sub\">
    <li><a href=\"index.php?acao=$VM\">Visualizar Multas</a></li>
                      <li><a href=\"index.php?acao=$CM\">Criar Multa</a></li>
                      <li><a href=\"index.php?acao=$LM\">Limpar Multa</a></li>
                    </ul>
              </li>";
           if($_SESSION['nivel_acesso']=='1' || $_SESSION['nivel_acesso']=='2' || $_SESSION['nivel_acesso']=='3')echo "<li><a href=\"#\">Reserva</a>
                    <ul id=\"sub\">
						<li><a href=\"index.php?acao=$CR\">Registrar Reserva</a></li>
                      <li><a href=\"index.php?acao=$VR\">Visualizar Itens Reservados</a></li>
                    </ul>
              </li>
			   ";
			if($_SESSION['nivel_acesso']=='3')echo "<li><a href=\"#\">Aterar Dados</a>
                    <ul id=\"sub\">
					  <li><a href=\"index.php?acao=$VADU\">Aterar Usuarios</a></li>
                      <li><a href=\"index.php?acao=$VADTM\">Aterar Tipo Mídia</a></li>
                      <li><a href=\"index.php?acao=$VADA\">Aterar Autores</a></li>
                      <li><a href=\"index.php?acao=$TCC\">Aterar Curso</a></li>
                      <li><a href=\"index.php?acao=$VADE\">Aterar Editoras</a></li>
                      <li><a href=\"index.php?acao=$VADI\">Aterar Idiomas</a></li>
                      <li><a href=\"index.php?acao=$VADL\">Aterar Livro</a></li>
                      <li><a href=\"index.php?acao=$VADM\">Aterar Mídia</a></li>
                      <li><a href=\"index.php?acao=$VADF\">Aterar Folheto</a></li>
                      <li><a href=\"index.php?acao=$VADT\">Aterar Textos</a></li>
                    </ul>
              </li>";
			if($_SESSION['nivel_acesso']=='3')echo "<li><a href=\"#\">Relatórios Gerencias</a>
                    <ul id=\"sub\">
					<li><a href=\"#\">Relatorio Mensal</a>
						<ul id=\"sub2\">
							<li><a href=\"funcoes/contabilidade_emprestimo_diario.php?mes=02\" target=\"_blank\">Fevereiro</a></li>
							<li><a href=\"funcoes/contabilidade_emprestimo_diario.php?acao=$RGM&&mes=03\" target=\"_blank\">Março</a></li>
							<li><a href=\"funcoes/contabilidade_emprestimo_diario.php?acao=$RGM&&mes=04\" target=\"_blank\">Abril</a></li>
							<li><a href=\"funcoes/contabilidade_emprestimo_diario.php?acao=$RGM&&mes=05\" target=\"_blank\">Maio</a></li>
							<li><a href=\"funcoes/contabilidade_emprestimo_diario.php?acao=$RGM&&mes=06\" target=\"_blank\">Junho</a></li>
							<li><a href=\"funcoes/contabilidade_emprestimo_diario.php?acao=$RGM&&mes=07\" target=\"_blank\">Julho</a></li>
							<li><a href=\"funcoes/contabilidade_emprestimo_diario.php?acao=$RGM&&mes=08\" target=\"_blank\">Agosto</a></li>
							<li><a href=\"funcoes/contabilidade_emprestimo_diario.php?acao=$RGM&&mes=09\" target=\"_blank\">Setembro</a></li>
							<li><a href=\"funcoes/contabilidade_emprestimo_diario.php?acao=$RGM&&mes=10\" target=\"_blank\">Outubro</a></li>
							<li><a href=\"funcoes/contabilidade_emprestimo_diario.php?acao=$RGM&&mes=11\" target=\"_blank\">Novembro</a></li>
							<li><a href=\"funcoes/contabilidade_emprestimo_diario.php?acao=$RGM&&mes=12\" target=\"_blank\">Desembro</a></li>
						</ul></li>
                      <li><a href=\"funcoes/cont_anual.php?mes=13\" target=\"_blank\">Relatório Anual</a></li>
					<li><a href=\"test.php?fo=1\" target=\"_blank\">Relatorio Por Periódo</a></li>
					<li><a href=\"test.php?fo=0\" target=\"_blank\">Lista De Alunos</a></li></ul>
              </li>";?>
            </ul>