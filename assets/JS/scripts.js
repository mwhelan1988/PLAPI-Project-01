$(document).ready(function(){
    //document is loaded, ready to run more code

 
    var search_query = '';
    var search_model = '';
    var selected_year = 0;
    var car_id = false;
    

    cool_search();

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



    $("#year-select").on("change", function(){
        selected_year = $(this).val();
        cool_search();
    });

    $("#search-form #search-model").on("keyup", function() {
        //Get the value in the search box
        //Send query to PHP file
        //Return rows from PHP file that match query 
        //Replace table rows with new results

         search_model = $(this).val();
         cool_search();

    }); //end of search keyup

    //on delete button click 
    $("#search-results").on("click", "[data-action=delete]", function(){
        car_id = $(this).data("car");

        $("#deleteCarAlert").modal("show");
    });

    //on delete confirmation click 
    $("#deleteCarAlert").on("click", "[data-action=confirm-delete]", function(){
        console.log(car_id);
        $.ajax({
            url: "ajax/delete.php",
            type: "POST",
            data:{
                id: car_id
            },
            success: function(result){
                console.log(result);
                $("#deleteCarAlert").modal("hide");
                car_id = false;
                cool_search();
            }
        });
    });




        //on add button click 
        $("#new-car").on("click", "[data-action=add]", function(){
            var make = $("#car_make_input").val();
            var model = $("#car_model_input").val();
            var year = $("#car_year_input").val();
            var nickname = $("#car_nickname_input").val();
            $.post(
                "ajax/add.php",
                {
                    make: make,
                    model: model,
                    year: year,
                    nickname: nickname
                },
                function(result){
                    console.log(result);
                    cool_search();
                }
            );
    
         
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
                // make: make_model,
                search: search_query,
                search_model: search_model,
                year: selected_year
            }, //Date to be passed to file via POST
            function(car_data){ //On complete function(return data)

               if(car_data == "") return;

               var cars = JSON.parse(car_data); //Translates PHP JSON into usable Javascript 
               var table_rows = '';

               //for each( index, object)
               $.each(cars, function(i, car){
                  table_rows += "<tr><td>"+car.make+
                                "</td><td>"+car.model+
                                "</td><td>"+car.year+
                                "</td><td>"+car.nickname+
                                "</td><td>"+
                                "<button class='btn btn-danger' data-action='delete' data-car='"+car.id+"'><i class='fas fa-trash'></i></button>"+
                                "</td></tr>";
               });
               
               $("#search-results").html(table_rows);
            }
        ); //end $.post


    } //end of cool search

}); //end of document ready