<?php

namespace PDLoader;

class Basicapp extends Loader{

	public function header($arr=[],$url=false,$cdn=false){
		$css = '';

		foreach( $this->config(true)['plugins'] as $p ){

			if( !$url ){
				if( $this->config() && isset($this->config()['url'] ) ){
					$url = $this->config()['url'];
				}else{
					$url = $this->url();
				}
			}
			
			if( count($arr) == 0 ){
				if( $this->config() && isset($this->config()['excluded'] ) ){
					$arr = $this->config()['excluded'];
				}
			}
			
			if( !in_array($p['name'], $arr) ){
				if( $cdn && $this->is_connected() ){
					if( isset($p['assets']['cdn'] ) ){				
						$css.="<link type='text/css' rel='stylesheet' href='".$p['assets']['css']['cdn']."'>\n";
					}else{
						if( isset($p['assets']['css']['local'] )  ){
							if( strpos($p['assets']['css']['local'], '*') ){
								foreach (glob(__DIR__.'/'. $p['assets']['css']['local']) as $c) {
									$c = str_replace(__DIR__,$url.'loader/modules/Basicapp',$c);
								    $css.="<link type='text/css' rel='stylesheet' href='$c'>\n";
								}
							}else{
								$css.="<link type='text/css' rel='stylesheet' href='".$url.'loader/modules/Basicapp/'. $p['assets']['css']['local']."'>\n";
							}
							
						}
					}
				}else{
					if( isset($p['assets']['css']['local'] )  ){
						if( strpos($p['assets']['css']['local'], '*') ){
							foreach (glob(__DIR__.'/'. $p['assets']['css']['local']) as $c) {
								$c = str_replace(__DIR__,$url.'loader/modules/Basicapp',$c);
							    $css.="<link type='text/css' rel='stylesheet' href='$c'>\n";
							}
						}else{
							$css.="<link type='text/css' rel='stylesheet' href='".$url.'loader/modules/Basicapp/'. $p['assets']['css']['local']."'>\n";
						}
						
					}
					
				}
			}
			
			
			
		}

		echo $css;

	}

	public function footer($arr=[],$url=false,$cdn=false){

		$js = '';

		if( !$url ){
			if( $this->config() && isset($this->config()['url'] ) ){
				$url = $this->config()['url'];
			}else{
				$url = $this->url();
			}
		}
		
		if( count($arr) == 0 ){
			if( $this->config() && isset($this->config()['excluded'] ) ){
				$arr = $this->config()['excluded'];
			}
		}

		foreach( $this->config(true)['plugins'] as $p ){

			if( !in_array($p['name'], $arr) ){
				if( $cdn && $this->is_connected() ){
					if( isset($p['assets']['cdn'] ) ){				
						$js.="<script src='".$p['assets']['js']['cdn']."'></script>\n";
					}else{
						if( isset($p['assets']['js']['local'] )  ){
							if( strpos($p['assets']['js']['local'], '*') ){
								foreach (glob(__DIR__.'/'. $p['assets']['js']['local']) as $j) {
									$j = str_replace(__DIR__,$url.'loader/modules/Basicapp',$j);
								    $js.="<script src='$j'></script>\n";
								}
							}else{
								$js.="<script src='".$url.'loader/modules/Basicapp/'. $p['assets']['js']['local']."'></script>\n";
							}
							
						}
					}
				}else{
					if( isset($p['assets']['js']['local'] )  ){
						if( strpos($p['assets']['js']['local'], '*') ){
							foreach (glob(__DIR__.'/'. $p['assets']['js']['local']) as $j) {
								$j = str_replace(__DIR__,$url.'loader/modules/Basicapp',$j);
							    $js.="<script src='$j'></script>\n";
							}
						}else{
							$js.="<script src='".$url.'loader/modules/Basicapp/'. $p['assets']['js']['local']."'></script>\n";
						}
						
					}
					
				}

				if( isset($p['assets']['js']['init']) ){
					$js.=$p['assets']['js']['init']."\n";
				}
			}
			
			
			
		}

		echo $js;
	}

	public function onBuild()
	{
		if( !file_exists(__DIR__.'/../../../index.php') ){
			$index = fopen(__DIR__.'/../../../index.php', "w");
			fwrite($index, file_get_contents(__DIR__.'/template.temp'));
			fclose($index);
		}

		if( !file_exists(__DIR__.'/../../../assets') ){
			mkdir(__DIR__.'/../../../assets', 0777, true);
		}
		if( !file_exists(__DIR__.'/../../../assets/css') ){
			mkdir(__DIR__.'/../../../assets/css', 0777, true);
		}

		if( !file_exists(__DIR__.'/../../../assets/js') ){
			mkdir(__DIR__.'/../../../assets/js', 0777, true);
		}
		if( !file_exists(__DIR__.'/../../../assets/img') ){
			mkdir(__DIR__.'/../../../assets/img', 0777, true);
		}
		if( !file_exists(__DIR__.'/../../../assets/css/sass') ){
			mkdir(__DIR__.'/../../../assets/css/sass', 0777, true);
			$zip = new \ZipArchive;
			$res = $zip->open(__DIR__.'/mixins.zip');

			$m_folder = false;

			if ($res === TRUE) {
				$zip->extractTo(__DIR__.'/../../../assets/css/sass');
				$zip->close();
			}
		}else{
			if( !file_exists(__DIR__.'/../../../assets/css/sass/mixins') ){

				$zip = new \ZipArchive;
				$res = $zip->open(__DIR__.'/mixins.zip');

				$m_folder = false;

				if ($res === TRUE) {
					$zip->extractTo(__DIR__.'/../../../assets/css/sass');
					$zip->close();
				}
			}
		}

		// delete the zip
		unlink(__DIR__.'/template.temp');
		unlink(__DIR__.'/mixins.zip');

	}
}
