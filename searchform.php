<form action="<?php echo home_url(); ?>" method="get" class="form-inline pull-right hidden-xs">
    <div id="imaginary_container"> 
        <div class="input-group stylish-input-group">
            <input type="text" class="form-control mysearch-input"  placeholder="Rechercher" value="<?php echo get_search_query(); ?>" name="s" id="s" onblur="if(this.value=='')this.value=''" onfocus="if(this.value=='')this.value=''">
            <span class="input-group-addon">
                <button type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>  
            </span>
        </div>
    </div>
</form>