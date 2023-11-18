<?php

class Voitures{
	private $_id_voiture;
	private $_marque;
	private $_description;
	private $_immat;
	private $_prix_parj;
	private $_statut;
	private $_genre;
    private $_img;

	public function __construct(array $data)
	{
		$this->hydrate($data);
	}
	// hydratation 
	public function hydrate(array $data)
	{
		foreach ($data as $key => $value) {
			$method = 'set'.ucfirst($key);

			if(method_exists($this, $method))
				$this->$method($value);
		}
	}

	public function setId_voiture($id_voiture)
	{
		$id_voiture = (int) $id_voiture;
		if($id_voiture>0)
			$this->_id_voiture=$id_voiture;
	}

	public function setMarque($marque)
	{
		if(is_string($marque))
			$this->_marque=$marque;
	}

	public function setDescription($description)
	{
			$this->_description=$description;
	}

	public function setImmat($immat)
	{
	    $this->_immat=$immat;
	}

	public function setPrix_parj($prix_parj)
	{
			$this->_prix_parj=$prix_parj;
	}

	public function setStatut($statut)
	{
	    $this->_statut=$statut;
	}

	public function setImg($img)
	{
	    $this->_img=$img;
	}
	public function setGenre($genre)
	{
	    $this->_genre=$genre;
	}

	public function id_voiture()
	{
     return $this->_id_voiture;
	}

	public function marque()
	{
     return $this->_marque;
	}

	public function description()
	{
     return $this->_description;
	}

	public function immat()
	{
     return $this->_immat;
	}

	public function prix_parj()
	{
     return $this->_prix_parj;
	}
    
    public function statut()
	{
     return $this->_statut;
	}

	public function img()
	{
     return $this->_img;
	}
	public function genre()
	{
     return $this->_genre;
	}

	
}