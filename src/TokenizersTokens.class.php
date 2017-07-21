<?php
require_once __DIR__.'/TokenizersToken.class.php';

/**
 *
 * @author tomoaki.tsukamoto
 */
class TokenizersTokens extends ArrayObject {
	
	public function __construct() {
		parent::__construct([]);
	}
	
	/**
	 * 
	 * @param type $source
	 * @return \TokenizersTokens
	 */
	public static function create_by_source($source){
		$org_tokens = token_get_all($source);
		$instance = new TokenizersTokens();
		foreach ($org_tokens as $org_token) {
			$token = new TokenizersToken($org_token);
			$instance->append($token);
		}
		return $instance;
	}
	
	/**
	 * @param TokenizersToken $token
	 * @return type
	 */
	public function append(TokenizersToken $token) {
		return parent::append($token);
	}

	/**
	 * 
	 * @param type $start_index
	 * @param type $token_index
	 * @return \TokenizersToken
	 * @throws Exception
	 */
	public function find_before($start_index, $token_index) {
		if(!is_int($start_index)){
			throw new Exception(__CLASS__." ".__METHOD__."parametor 1 error");
		}
		if(!is_int($token_index)){
			throw new Exception(__CLASS__." ".__METHOD__."parametor 2 error");
		}
		for ($i = $start_index; $i >= 0; $i--) {
			if($this->offsetGet($i)->get_token_index() === $token_index){
				return $this->offsetGet($i);
			}
		}
		return new TokenizersToken();
	}
	/**
	 * 
	 * @param type $start_index
	 * @param type $token_index
	 * @return \TokenizersToken
	 * @throws Exception
	 */
	public function find_after($start_index, $token_index) {
		if(!is_int($start_index)){
			throw new Exception(__CLASS__." ".__METHOD__."parametor 1 error");
		}
		if(!is_int($token_index)){
			throw new Exception(__CLASS__." ".__METHOD__."parametor 2 error");
		}
		for ($i = $start_index; $i < $this->count(); $i++) {
			if($this->offsetGet($i)->get_token_index() === $token_index){
				return $this->offsetGet($i);
			}
		}
		return new TokenizersToken();
	}
	
	/**
	 * @param type $index
	 * @return \TokenizersToken token
	 */
	public function offsetGet($index) {
		$item = parent::offsetGet($index);
		if(!($item instanceof TokenizersToken)){
			throw new Exception("instance error");
		}
		return $item;
	}

}
