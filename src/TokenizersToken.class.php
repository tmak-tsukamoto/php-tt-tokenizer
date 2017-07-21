<?php

/**
 * token_get_all で解析した 1トークンの構造体<br/>
 * 
 * @author t.tsukamoto
 * @requires PHP5.4を対象にしています
 */
class TokenizersToken {

	const T_FOUND = 0;

	/** トークンのインデックス */
	private $token_index = 0;
	/** トークンの値 */
	private $value = "";
	/** 行番号 */
	private $line = -1;

	public function __construct($token = []) {
		if(is_array($token)){
			$this->token_index = isset($token[0]) ? (int)$token[0] : self::T_FOUND;
			$this->value = isset($token[1]) ? $token[1] : "";
			$this->line = isset($token[2]) ? $token[2] : -1;
		}
	}

	public function is_empty() {
		return in_array($this->token_index, [
			self::T_FOUND,
			T_WHITESPACE,
			T_BREAK
		]);
	}

	/**
	 * @return int トークンのインデックス
	 */
	public function get_token_index() {
		return $this->token_index;
	}

	/**
	 * @return string トークンの値
	 */
	public function get_value() {
		return $this->value;
	}

	/**
	 * @return int 行番号
	 */
	public function get_line() {
		return $this->line;
	}

	/**
	 * @return string  PHP トークンのシンボル名
	 */
	public function get_token_name() {
		return token_name($this->token_index);
	}

	/** abstract : クラスの抽象化 (PHP 5.0.0 以降で使用可能) */
	public function t_abstract() {
		return $this->token_index === T_ABSTRACT;
	}

	/** &= : 代入演算子 */
	public function t_and_equal() {
		return $this->token_index === T_AND_EQUAL;
	}

	/** array() : array(), array 構文 */
	public function t_array() {
		return $this->token_index === T_ARRAY;
	}

	/** (array) : 型キャスト */
	public function t_array_cast() {
		return $this->token_index === T_ARRAY_CAST;
	}

	/** as : foreach */
	public function t_as() {
		return $this->token_index === T_AS;
	}

	/**   : ASCII 32以下の全ての文字。\t (0x09), \n (0x0a) , \r (0x0d) は除く */
	public function t_bad_character() {
		return $this->token_index === T_BAD_CHARACTER;
	}

	/** && : 論理演算子 */
	public function t_boolean_and() {
		return $this->token_index === T_BOOLEAN_AND;
	}

	/** || : 論理演算子 */
	public function t_boolean_or() {
		return $this->token_index === T_BOOLEAN_OR;
	}

	/** (bool) or (boolean) : 型キャスト */
	public function t_bool_cast() {
		return $this->token_index === T_BOOL_CAST;
	}

	/** break; : break */
	public function t_break() {
		return $this->token_index === T_BREAK;
	}

	/** callable : callable */
	public function t_callable() {
		return $this->token_index === T_CALLABLE;
	}

	/** case : switch */
	public function t_case() {
		return $this->token_index === T_CASE;
	}

	/** catch : 例外(exceptions) (PHP 5.0.0 以降で使用可能) */
	public function t_catch() {
		return $this->token_index === T_CATCH;
	}

	/**   : 今では使用されていません */
	public function t_character() {
		return $this->token_index === T_CHARACTER;
	}

	/** class : クラスとオブジェクト */
	public function t_class() {
		return $this->token_index === T_CLASS;
	}

	/** __CLASS__ : マジック定数 */
	public function t_class_c() {
		return $this->token_index === T_CLASS_C;
	}

	/** clone : クラスとオブジェクト */
	public function t_clone() {
		return $this->token_index === T_CLONE;
	}

	/** ?> or %> : HTML からの脱出 */
	public function t_close_tag() {
		return $this->token_index === T_CLOSE_TAG;
	}

	/** // or #, and / * * / : コメント */
	public function t_comment() {
		return $this->token_index === T_COMMENT;
	}

	/** .= : 代入演算子 */
	public function t_concat_equal() {
		return $this->token_index === T_CONCAT_EQUAL;
	}

	/** const : クラス定数 */
	public function t_const() {
		return $this->token_index === T_CONST;
	}

	/** "foo" or 'bar' : 文字列構文 */
	public function t_constant_encapsed_string() {
		return $this->token_index === T_CONSTANT_ENCAPSED_STRING;
	}

	/** continue : continue */
	public function t_continue() {
		return $this->token_index === T_CONTINUE;
	}

	/** {$ : 複雑な構文 */
	public function t_curly_open() {
		return $this->token_index === T_CURLY_OPEN;
	}

	/** -- : 可算/減算演算子 */
	public function t_dec() {
		return $this->token_index === T_DEC;
	}

	/** declare : declare */
	public function t_declare() {
		return $this->token_index === T_DECLARE;
	}

	/** default : switch */
	public function t_default() {
		return $this->token_index === T_DEFAULT;
	}

	/** __DIR__ : マジック定数 (PHP 5.3.0 以降で使用可能) */
	public function t_dir() {
		return $this->token_index === T_DIR;
	}

	/** /= : 代入演算子 */
	public function t_div_equal() {
		return $this->token_index === T_DIV_EQUAL;
	}

	/** 0.12, etc : 浮動小数点数 */
	public function t_dnumber() {
		return $this->token_index === T_DNUMBER;
	}

	/** / ** * / : PHPDoc 形式のコメント */
	public function t_doc_comment() {
		return $this->token_index === T_DOC_COMMENT;
	}

	/** do : do..while */
	public function t_do() {
		return $this->token_index === T_DO;
	}

	/** ${ : complex variable parsed syntax */
	public function t_dollar_open_curly_braces() {
		return $this->token_index === T_DOLLAR_OPEN_CURLY_BRACES;
	}

	/** => : array 構文 */
	public function t_double_arrow() {
		return $this->token_index === T_DOUBLE_ARROW;
	}

	/** (real), (double) or (float) : 型キャスト */
	public function t_double_cast() {
		return $this->token_index === T_DOUBLE_CAST;
	}

	/** :: : 下の T_PAAMAYIM_NEKUDOTAYIM を参照ください。 */
	public function t_double_colon() {
		return $this->token_index === T_DOUBLE_COLON;
	}

	/** echo : echo */
	public function t_echo() {
		return $this->token_index === T_ECHO;
	}

	/** ... : 関数の引数 (PHP 5.6.0 以降で使用可能) */
	public function t_ellipsis() {
		return $this->token_index === T_ELLIPSIS;
	}

	/** else : else */
	public function t_else() {
		return $this->token_index === T_ELSE;
	}

	/** elseif : elseif */
	public function t_elseif() {
		return $this->token_index === T_ELSEIF;
	}

	/** empty : empty() */
	public function t_empty() {
		return $this->token_index === T_EMPTY;
	}

	/** " $a" : 文字列のパース */
	public function t_encapsed_and_whitespace() {
		return $this->token_index === T_ENCAPSED_AND_WHITESPACE;
	}

	/** enddeclare : declare, 別の構文 */
	public function t_enddeclare() {
		return $this->token_index === T_ENDDECLARE;
	}

	/** endfor : for, 別の構文 */
	public function t_endfor() {
		return $this->token_index === T_ENDFOR;
	}

	/** endforeach : foreach, 別の構文 */
	public function t_endforeach() {
		return $this->token_index === T_ENDFOREACH;
	}

	/** endif : if, 別の構文 */
	public function t_endif() {
		return $this->token_index === T_ENDIF;
	}

	/** endswitch : switch, 別の構文 */
	public function t_endswitch() {
		return $this->token_index === T_ENDSWITCH;
	}

	/** endwhile : while, 別の構文 */
	public function t_endwhile() {
		return $this->token_index === T_ENDWHILE;
	}

	/**   : heredoc 構文 */
	public function t_end_heredoc() {
		return $this->token_index === T_END_HEREDOC;
	}

	/** eval() : eval() */
	public function t_eval() {
		return $this->token_index === T_EVAL;
	}

	/** exit or die : exit(), die() */
	public function t_exit() {
		return $this->token_index === T_EXIT;
	}

	/** extends : extends, クラスとオブジェクト */
	public function t_extends() {
		return $this->token_index === T_EXTENDS;
	}

	/** __FILE__ : 定数 */
	public function t_file() {
		return $this->token_index === T_FILE;
	}

	/** final : finalキーワード */
	public function t_final() {
		return $this->token_index === T_FINAL;
	}

	/** finally : 例外(exceptions) (PHP 5.5.0 以降で使用可能) */
	public function t_finally() {
		return $this->token_index === T_FINALLY;
	}

	/** for : for */
	public function t_for() {
		return $this->token_index === T_FOR;
	}

	/** foreach : foreach */
	public function t_foreach() {
		return $this->token_index === T_FOREACH;
	}

	/** function or cfunction : 関数 */
	public function t_function() {
		return $this->token_index === T_FUNCTION;
	}

	/** __FUNCTION__ : 定数 */
	public function t_func_c() {
		return $this->token_index === T_FUNC_C;
	}

	/** global : 変数のスコープ */
	public function t_global() {
		return $this->token_index === T_GLOBAL;
	}

	/** goto : (PHP 5.3.0 以降で使用可能) */
	public function t_goto() {
		return $this->token_index === T_GOTO;
	}

	/** __halt_compiler() : __halt_compiler (PHP 5.1.0 以降で使用可能) */
	public function t_halt_compiler() {
		return $this->token_index === T_HALT_COMPILER;
	}

	/** if : if */
	public function t_if() {
		return $this->token_index === T_IF;
	}

	/** implements : オブジェクト インターフェイス */
	public function t_implements() {
		return $this->token_index === T_IMPLEMENTS;
	}

	/** ++ : 加算/減算演算子 */
	public function t_inc() {
		return $this->token_index === T_INC;
	}

	/** include() : include */
	public function t_include() {
		return $this->token_index === T_INCLUDE;
	}

	/** include_once() : include_once */
	public function t_include_once() {
		return $this->token_index === T_INCLUDE_ONCE;
	}

	/**   : PHP の外部のテキスト */
	public function t_inline_html() {
		return $this->token_index === T_INLINE_HTML;
	}

	/** instanceof : 型演算子 */
	public function t_instanceof() {
		return $this->token_index === T_INSTANCEOF;
	}

	/** insteadof : トレイト (PHP 5.4.0 以降で使用可能) */
	public function t_insteadof() {
		return $this->token_index === T_INSTEADOF;
	}

	/** (int) or (integer) : 型キャスト */
	public function t_int_cast() {
		return $this->token_index === T_INT_CAST;
	}

	/** interface : オブジェクト インターフェイス */
	public function t_interface() {
		return $this->token_index === T_INTERFACE;
	}

	/** isset() : isset() */
	public function t_isset() {
		return $this->token_index === T_ISSET;
	}

	/** == : 比較演算子 */
	public function t_is_equal() {
		return $this->token_index === T_IS_EQUAL;
	}

	/** >= : 比較演算子 */
	public function t_is_greater_or_equal() {
		return $this->token_index === T_IS_GREATER_OR_EQUAL;
	}

	/** === : 比較演算子 */
	public function t_is_identical() {
		return $this->token_index === T_IS_IDENTICAL;
	}

	/** != or <> : 比較演算子 */
	public function t_is_not_equal() {
		return $this->token_index === T_IS_NOT_EQUAL;
	}

	/** !== : 比較演算子 */
	public function t_is_not_identical() {
		return $this->token_index === T_IS_NOT_IDENTICAL;
	}

	/** <= : 比較演算子 */
	public function t_is_smaller_or_equal() {
		return $this->token_index === T_IS_SMALLER_OR_EQUAL;
	}

	/** <=> : 比較演算子 (PHP 7.0.0 以降で使用可能) */
	public function t_spaceship() {
		return $this->token_index === T_SPACESHIP;
	}

	/** __LINE__ : 定数 */
	public function t_line() {
		return $this->token_index === T_LINE;
	}

	/** list() : list() */
	public function t_list() {
		return $this->token_index === T_LIST;
	}

	/** 123, 012, 0x1ac, etc : 整数 */
	public function t_lnumber() {
		return $this->token_index === T_LNUMBER;
	}

	/** and : 論理演算子 */
	public function t_logical_and() {
		return $this->token_index === T_LOGICAL_AND;
	}

	/** or : 論理演算子 */
	public function t_logical_or() {
		return $this->token_index === T_LOGICAL_OR;
	}

	/** xor : 論理演算子 */
	public function t_logical_xor() {
		return $this->token_index === T_LOGICAL_XOR;
	}

	/** __METHOD__ : マジック定数 */
	public function t_method_c() {
		return $this->token_index === T_METHOD_C;
	}

	/** -= : 代入演算子 */
	public function t_minus_equal() {
		return $this->token_index === T_MINUS_EQUAL;
	}

	/** %= : 代入演算子 */
	public function t_mod_equal() {
		return $this->token_index === T_MOD_EQUAL;
	}

	/**	 * = : 代入演算子 */
	public function t_mul_equal() {
		return $this->token_index === T_MUL_EQUAL;
	}

	/** namespace : 名前空間 (PHP 5.3.0 以降で使用可能) */
	public function t_namespace() {
		return $this->token_index === T_NAMESPACE;
	}

	/** __NAMESPACE__ : 名前空間 (PHP 5.3.0 以降で使用可能) */
	public function t_ns_c() {
		return $this->token_index === T_NS_C;
	}

	/** \ : 名前空間 (PHP 5.3.0 以降で使用可能) */
	public function t_ns_separator() {
		return $this->token_index === T_NS_SEPARATOR;
	}

	/** new : クラスとオブジェクト */
	public function t_new() {
		return $this->token_index === T_NEW;
	}

	/** "$a[0]" : 文字列内の配列の添字 */
	public function t_num_string() {
		return $this->token_index === T_NUM_STRING;
	}

	/** (object) : 型キャスト */
	public function t_object_cast() {
		return $this->token_index === T_OBJECT_CAST;
	}

	/** -> : クラスとオブジェクト */
	public function t_object_operator() {
		return $this->token_index === T_OBJECT_OPERATOR;
	}

	/** <?php, <? or <% : HTML からのエスケープ */
	public function t_open_tag() {
		return $this->token_index === T_OPEN_TAG;
	}

	/** <?= or <%= : HTML からのエスケープ */
	public function t_open_tag_with_echo() {
		return $this->token_index === T_OPEN_TAG_WITH_ECHO;
	}

	/** |= : 代入演算子 */
	public function t_or_equal() {
		return $this->token_index === T_OR_EQUAL;
	}

	/** :: : ::。  */
	public function t_paamayim_nekudotayim() {
		return $this->token_index === T_PAAMAYIM_NEKUDOTAYIM;
	}

	/** += : 代入演算子 */
	public function t_plus_equal() {
		return $this->token_index === T_PLUS_EQUAL;
	}

	/**	 * * : 代数演算子 (PHP 5.6.0 以降で使用可能) */
	public function t_pow() {
		return $this->token_index === T_POW;
	}

	/**	 * *= : 代数演算子 (PHP 5.6.0 以降で使用可能) */
	public function t_pow_equal() {
		return $this->token_index === T_POW_EQUAL;
	}

	/** print() : print */
	public function t_print() {
		return $this->token_index === T_PRINT;
	}

	/** private : クラスとオブジェクト */
	public function t_private() {
		return $this->token_index === T_PRIVATE;
	}

	/** public : クラスとオブジェクト */
	public function t_public() {
		return $this->token_index === T_PUBLIC;
	}

	/** protected : クラスとオブジェクト (PHP 5.0.0 以降で使用可能) */
	public function t_protected() {
		return $this->token_index === T_PROTECTED;
	}

	/** require() : require */
	public function t_require() {
		return $this->token_index === T_REQUIRE;
	}

	/** require_once() : require_once */
	public function t_require_once() {
		return $this->token_index === T_REQUIRE_ONCE;
	}

	/** return : 値を返す */
	public function t_return() {
		return $this->token_index === T_RETURN;
	}

	/** << : ビット演算子 */
	public function t_sl() {
		return $this->token_index === T_SL;
	}

	/** <<= : 代入演算子 */
	public function t_sl_equal() {
		return $this->token_index === T_SL_EQUAL;
	}

	/** >> : ビット演算子 */
	public function t_sr() {
		return $this->token_index === T_SR;
	}

	/** >>= : 代入演算子 */
	public function t_sr_equal() {
		return $this->token_index === T_SR_EQUAL;
	}

	/** <<< : heredoc 構文 */
	public function t_start_heredoc() {
		return $this->token_index === T_START_HEREDOC;
	}

	/** static : 変数スコープ */
	public function t_static() {
		return $this->token_index === T_STATIC;
	}

	/** parent、true など : 識別子。たとえば parent や self といったオブジェクト指向のキーワード、そして関数名やクラス名などにマッチします。 */
	public function t_string() {
		return $this->token_index === T_STRING;
	}

	/** (string) : 型キャスト */
	public function t_string_cast() {
		return $this->token_index === T_STRING_CAST;
	}

	/** "${a : 複雑な構文 */
	public function t_string_varname() {
		return $this->token_index === T_STRING_VARNAME;
	}

	/** switch : switch */
	public function t_switch() {
		return $this->token_index === T_SWITCH;
	}

	/** throw : 例外(exceptions) */
	public function t_throw() {
		return $this->token_index === T_THROW;
	}

	/** trait : トレイト (PHP 5.4.0 以降で使用可能) */
	public function t_trait() {
		return $this->token_index === T_TRAIT;
	}

	/** __TRAIT__ : __TRAIT__ (PHP 5.4.0 以降で使用可能) */
	public function t_trait_c() {
		return $this->token_index === T_TRAIT_C;
	}

	/** try : 例外(exceptions) */
	public function t_try() {
		return $this->token_index === T_TRY;
	}

	/** unset() : unset() */
	public function t_unset() {
		return $this->token_index === T_UNSET;
	}

	/** (unset) : 型キャスト */
	public function t_unset_cast() {
		return $this->token_index === T_UNSET_CAST;
	}

	/** use : 名前空間 (PHP 5.3.0 以降で使用可能、PHP 4.0.0 以降で予約済み) */
	public function t_use() {
		return $this->token_index === T_USE;
	}

	/** var : クラスとオブジェクト */
	public function t_var() {
		return $this->token_index === T_VAR;
	}

	/** $foo : 変数 */
	public function t_variable() {
		return $this->token_index === T_VARIABLE;
	}

	/** while : while, do..while */
	public function t_while() {
		return $this->token_index === T_WHILE;
	}

	/** \t \r\n :   */
	public function t_whitespace() {
		return $this->token_index === T_WHITESPACE;
	}

	/** ^= : 代入演算子 */
	public function t_xor_equal() {
		return $this->token_index === T_XOR_EQUAL;
	}

	/** yield : ジェネレータ (PHP 5.5.0 以降で使用可能) */
	public function t_yield() {
		return $this->token_index === T_YIELD;
	}

}
