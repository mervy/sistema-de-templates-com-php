            <?php if($this->session('logged')):?>
                
                <h1>Olá <?=$this->session('user')->firstName?></h1>                
            
            <?php endif?>

                <h3>Bem-vindo!</h3>