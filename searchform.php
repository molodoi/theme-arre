<form action="<?php echo home_url(); ?>" method="get" class="navbar-form navbar-right">
    <div class="form-group">
         <input type="text" class="form-control"  placeholder="Rechercher" value="<?php echo get_search_query(); ?>" name="s" id="s" onblur="if(this.value=='')this.value=''" onfocus="if(this.value=='')this.value=''">
    </div>
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
</form>