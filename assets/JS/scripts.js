$(document).ready(function(){
    //document is loaded, ready to run more code

    var make_model = '';
    var search_query = '';
    var selected_year = 0;

    $("#search-form").on("submit", function(e){
        e.preventDefault();  //This prevents form refresh 
    });

    //on keyup start searching cars
    $("#search-form #search-nickname").on("keyup", function() {
        //Get the value in the search box
        //Send query to PHP file
        //Return rows from PHP file that match query 
        //Replace table rows with new results

         search_query = $(this).val();
         cool_search();

    }); //end of search keyup

    $("#search-form #search-model").on("keyup", function() {
        //Get the value in the search box
        //Send query to PHP file
        //Return rows from PHP file that match query 
        //Replace table rows with new results

         search_query = $(this).val();
         cool_search();

    }); //end of search keyup

    $("#year-select").on("change", function(){
        selected_year = $(this).val();
        cool_search();
    });


    /* 
    cool_search
    send search query to search.php
    return json results
    */

    function cool_search() {

        $.post(
            'ajax/search.php', //URL of file to call 
            {
                make: make_model,
                search: search_query,
                year: selected_year
            }, //Date to be passed to file via POST
            function(car_data){ //On complete function(return data)

               if(car_data == "") return;

               var cars = JSON.parse(car_data); //Translates PHP JSON into usable Javascript 
               var table_rows = '';

               //for each( index, object)
               $.each(cars, function(i, car){
                  table_rows += "<tr><td>"+car.make+"</td><td>"+car.model+"</td><td>"+car.year+"</td><td>"+car.nickname+"</td></tr>";
               });
               
               $("#search-results").html(table_rows);
            }
        ); //end $.post


    } //end of cool search

}); //end of document ready