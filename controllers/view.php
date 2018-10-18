<?php 


class View
{
	/*public $menuWhiteList = [
			"un",
			"deux",
			"trois",
			""
		];*/

	/*public $specialPaths = [
			"_404" => "_404",
			"un" => "un",
			"deux" => "deux",
			"trois" => "trois"
		];*/

	//public $ip = "./views/1"
	public $head = "./views/layouts/head.html";
	public $footer = "./views/layouts/footer.html";
	public $pathViews = "./views/";
	public $uri;
	public $path;

	public function __construct($view)
	{
		$this->uri = $view;
		$this->path = "./views" . $view . ".html";
	}
	// FONCTION QUI REPRESENTE LA PAGE QUI SERA VISIBLE PAR L'UTILISATEUR
	public function renderView()
	{
		// PERMET D'ENONCER LES ARRAYS UTILES POUR LA VALIDATION, DONC ENLEVER LES ARRAYS QUE NOUS NE VOULONS PAS TRAITER
		$file = array_diff(scandir($this->pathViews), [".", "..", 'layouts',]);
		//var_dump(scandir($this->pathViews));
		
		// CONTENU
		$content = "";

		// POUR CHAQUE ARRAY TROUVÉ, RENVOYER SA VALEUR EN PASSANT PAR LE BIAIS DE SON LIEN 
		foreach ($file as $value) {
			$link = $this->pathViews . $value;
			$content .= file_get_contents($link);
		}
		// TENTATIVE DE METTRE PAR ODRE ALPHABETIQUE / LE CODE QUI SUIT ET UN BROUILLON DE CE QUE J'AI PU ESSAYER PENDANT LA VALIDATION
		$numbers = array(5, 2, 4);
		sort($numbers);

		//$input = array("un", "deux", "trois");

		/*if (file_exists($this->path)) {
			$content = file_get_contents($this->path);
		} else {
			$content =  file_get_contents("./views/layouts/_404.html");
		}


		/*if (file_exists($this->uri = "/1")) {
			$content = file_get_contents("./views/" . $this->specialPaths['un'] . ".html");
			} else {
				$content = file_get_contents("./views/deux.html");
			}/*
			//else { 
			//$content = file_get_contents("./index.php");
			//}*/
			/*if (in_array(substr($this->uri, 1), $this->menuWhiteList)) {
				$menuContent = $this->path;
			} else {
				$menuContent = "";
		}*/
		// ECHO LE HEADER ET LE FOOTER POUR METTRE EN PLACE LA LOGIQUE HTML
		echo file_get_contents($this->head) . $content . file_get_contents($this->footer);
	}
}