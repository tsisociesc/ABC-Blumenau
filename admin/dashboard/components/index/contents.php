<style>
	body #header {
		text-align: center;
	}
	body #header .titulo {
		font-size: 8vmin;
	}
	body #calendario {
		font-size: 4vmin;
		text-align: center;
	}
	body #calendario .col {
		font-size: 4vmin;
		border: #fff solid 5px;
		background: #f5f5f5;
		margin: 3px 3px;
		padding: 15px;
	}
	body #calendario .titulo {
		background: none;
		font-weight: bold;
	}
	body #calendario .empty {
		background: #76C2AF;
	}
	body #calendario .half {
		background: #F5CF87;
	}
	body #calendario .full {
		background: #C75C5C;
	}
	body #calendario .marked {
		border-color: #337ab7;
		border-width: 5px;
	}
	body #calendario .other-month {
		opacity: 0.3;
		filter: alpha(opacity=30);
	}
</style>
<?php
    $objMenus = null;
	function calendario() {
		// Inicialização
		$QTD_SEMANAS = 8;
		$TITULOS = array("Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab");
		$MESES = array( 'Jan' => 'Janeiro',
						'Feb' => 'Fevereiro',
						'Mar' => 'Marco',
						'Apr' => 'Abril',
						'May' => 'Maio',
						'Jun' => 'Junho',
						'Jul' => 'Julho',
						'Aug' => 'Agosto',
						'Nov' => 'Novembro',
						'Sep' => 'Setembro',
						'Oct' => 'Outubro',
						'Dec' => 'Dezembro');
		$hoje = new DateTime();

		$resultado = '<div class="container" id="header">';

		// Impressão da competência atual
		$resultado .= '<span class="titulo">'.$MESES[$hoje->format("M")].' de '.$hoje->format("Y").'</span>';
		$resultado .= '<hr>Pelotão';

		// Impressão do filtro por unidade
		$conn = new mysqli("localhost", "root", "", "u977609063_bcblu");
		if (!$conn->connect_error) {
			$sql = "SELECT idUnidade, descricao FROM unidade";
			$result = $conn->query($sql);

			$resultado .= '<div class="row"><div class="col">';
			while($row = $result->fetch_assoc()) {
				$resultado .= '<button type="button" class="btn btn-primary">'.$row["descricao"].'</button> ';
			}
			$resultado .= '</div></div><hr>';
			$conn->close();
		} else {
			$resultado .= '<div class="row"><div class="col">';
			$resultado .= '<button type="button" class="btn btn-primary">COBOM</button> ';
			$resultado .= '<button type="button" class="btn btn-primary">Centro</button> ';
			$resultado .= '<button type="button" class="btn btn-primary">Itoupava</button> ';
			$resultado .= '<button type="button" class="btn btn-primary">Garcia</button> ';
			$resultado .= '</div></div><hr>';
		}

		$resultado .= '</div>';
		$resultado .= '<div class="container" id="calendario">';
		// Impressão do título das colunas
		$resultado .= '<div class="row">';
		foreach ($TITULOS as $dia) {
			$resultado .= "<div class='col titulo' style='width: 158px;'>$dia</div>";
		}
		$resultado .= "</div>";

		// Loop de semanas
		$temp_ocupacao = 1;
		$temp_marcado  = 5;
		$dataAtu = new DateTime('Sunday last week');
		$mesIni = $hoje->format('m');
		for ($i = 1; $i <= $QTD_SEMANAS; $i++) {
			$resultado .= '<div class="row">';

			// Loop de dias
			for ($j = 1; $j <= 7; $j++) {
				$classe = "";
				$adicional = "";

				if ($dataAtu->format('m') <> $mesIni)
					$classe .= " other-month";

				if ($dataAtu->format("Y-m-d") >= $hoje->format("Y-m-d")) {
					$temp_ocupacao *= 0.96;
					$adicional .= "data-toggle='modal' data-target='#listaDatas'";
				
					if ($temp_ocupacao >= 0.8)
						$classe .= " full";
					else
					if ($temp_ocupacao >= 0.5)
						$classe .= " half";
					else
					if ($temp_ocupacao >= 0.1)
						$classe .= " empty";
					
					if ($j % $temp_marcado == 0) {
						$classe .= " marked";
						$temp_marcado = rand(1,5);
					}
				}

				// Impressão de dias
				$resultado .= "<div class='col $classe' data-date='".$dataAtu->format("Y-m-d")."' $adicional>".
								$dataAtu->format("d").
							  "</div>";
				$dataAtu->modify("+1 day");
			}

			$resultado .= "</div>";
		}

		$resultado .= "</div>";
		echo $resultado;
	}
	calendario();