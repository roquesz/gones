<?php

class Gone
{
	private $htmlContent;
	public function getHtmlGones($params)
	{
		$getParams = $this->mountParametres($params);
		$url = 'http://www.desaparecidos.gov.br/index.php/desparecidos?'.$getParams;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$htmlContent = curl_exec($ch);
		curl_close($ch);

		$this->htmlContent = $htmlContent;

		$this->boxGones();

		return $this->htmlContent;

	}

	public function boxGones()
	{
		$partHtmlContent = explode('<div class="boxDesaparecidor">', $this->htmlContent);
		$qtdRegisters = count($partHtmlContent);
		$boxGones = [];
		if($qtdRegisters > 0):
			for($x = 1; $x < ($qtdRegisters - 1); $x++):
				if($x == ($qtdRegisters - 1)):
					$partHtmlContent_end = explode('<div class="paginacao">', $partHtmlContent[$x]);
					$content = $partHtmlContent_end[0];
				else:
					$content = ($x == 1) ? '<div class="boxDesaparecidor">'.$partHtmlContent[$x] : $partHtmlContent[$x];
				endif;
				$content = str_replace('/desaparecidos/application/modulo/detalhes.php?id=', 'details/', $content);
				$content = str_replace(['\r', '\n', '\t'], '', $content);
				$boxGones[] = $content;
			endfor;
			$dataReturn = ['content' => $boxGones];
		else:
			$dataReturn = ['none' => 'Nenhum resultado encontrado'];
		endif;
		$this->htmlContent = json_encode($dataReturn);
	}

	public function listParametersForSearch()
	{
		return [
				'dt_inicio',
				'dt_fim',
				'situacao',
				'uf',
				'municipio'
				];
	}

	public function getGoneDetails($id)
	{
		$id = intval($id);
		if(!is_numeric($id)):
			return json_encode(['error' => 'Identificador não encontrado']);
		endif;
		$url = 'http://www.desaparecidos.gov.br/desaparecidos/application/modulo/detalhes.php?id='.$id;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$htmlContent = curl_exec($ch);
		$partHtmlContent = explode('<div class="detalhes">', $htmlContent);
		$partHtmlContent = '<div class="detalhes">'.$partHtmlContent[1];
		$dataReturn = ['content' => $partHtmlContent];
		return json_encode($dataReturn);

	}

	public function mountParametres($params)
	{
		$parameters = $this->listParametersForSearch();
		$paramsReturn = [];
		$key_params = array_keys($params);
		foreach ($key_params as $param) {
			if(in_array($param, $parameters)){
				$paramsReturn[] = $param .'='. $params[$param];
			}
		}
		return implode('&', $paramsReturn);
	}

	public function about()
	{
		$url = 'http://www.desaparecidos.gov.br/index.php/cat';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$htmlContent = curl_exec($ch);
		$partHtmlContent = explode('<div class="item-page">', $htmlContent);
		$partHtmlContent = explode('<div id="centro">', $partHtmlContent[1]);
		$partHtmlContent = '<div class="detalhes">'.$partHtmlContent[0];
		$dataReturn = ['content' => $partHtmlContent];
		return json_encode($dataReturn);
	}

	public function statistics()
	{
		$url = 'http://www.desaparecidos.gov.br/index.php/statistics';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$htmlContent = curl_exec($ch);
		$partHtmlContent = explode('<table width="100%" cellpadding="2" cellspacing="2" class="estatiticatable">', $htmlContent);
		$partHtmlContent = explode('<div style="clear:both"></div>', $partHtmlContent[1]);
		$partHtmlContent = '<table width="100%" cellpadding="2" cellspacing="2" class="estatiticatable">'.$partHtmlContent[0];
		$dataReturn = ['content' => $partHtmlContent];
		return json_encode($dataReturn);
	}

	public function info()
	{
		$url = 'http://www.desaparecidos.gov.br/index.php/info-de-apoio';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$htmlContent = curl_exec($ch);
		$partHtmlContent = explode('<div class="item-page">', $htmlContent);
		$partHtmlContent = explode('<div id="centro">', $partHtmlContent[1]);
		$partHtmlContent = '<div class="detalhes">'.$partHtmlContent[0];
		$dataReturn = ['content' => $partHtmlContent];
		return json_encode($dataReturn);
	}

	public function faq()
	{
		$url = 'http://www.desaparecidos.gov.br/index.php/perguntas-frequentes';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$htmlContent = curl_exec($ch);
		$partHtmlContent = explode('<div class="item-page">', $htmlContent);
		$partHtmlContent = explode('<div id="centro">', $partHtmlContent[1]);
		$partHtmlContent = '<div class="detalhes">'.$partHtmlContent[0];
		$dataReturn = ['content' => $partHtmlContent];
		return json_encode($dataReturn);
	}
}