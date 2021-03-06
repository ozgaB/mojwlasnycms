


<div class="row">
    <div class="col-2"></div>
    <div class="col-2">
        <?php
        require_once 'baza_pdo.php';

        if($_SESSION['img_status']==0)
        {
          echo   "<form action='pliki.php' method='post' enctype='multipart/form-data'>
            <div>
                <input type='hidden' name='Max_FILE_SIZE' value='30000000' />
              <input type='file' name='plik' />
              <input type='submit' value='Dodaj Plik'/>
                </div>";
        }
        else
        {
            
        }

        ?> 
        
        
        
        
    </div>
    <div class="col-2"></div>
    <div class="col-2"></div>
    <div class="col-2"></div>
    <div class="col-2"></div>    
</div>
        <form action="pliki.php" method="post" enctype="multipart/form-data">
            <div>
                <input type="hidden" name="Max_FILE_SIZE" value="30000000" />
              <input type="file" name="plik" />
              <input type="submit" value="Dodaj Plik"/>
                </div>
  
        </form>
        
        <?php
        if(isset($_FILES['plik']))
        {
           if($_FILES['plik']['type'] != 'image/png')
           {
               echo "plik musi mieć format png";
           }
           else{
            move_uploaded_file($_FILES['plik']['tmp_name'], "images/".$_FILES['plik']['name']);
    
            switch($_FILES['plik']['error'])
            {
                case 0;
                    break;
                case 1;
                    echo "za duży plik  php.ini";
                   
                break;
                case 4;
                    echo "nie wybrano pliku";
                    break;
                default:
                    echo "blad";
            }
           }
        }
        
        ?>