var my_handlers = {

    fill_provinces:  function(){

        var region_code = $(this).val();
        $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
    },

    fill_cities: function(){

        var province_code = $(this).val();
        $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
    },


    fill_barangays: function(){

        var city_code = $(this).val();
        $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
    }
    
};

$(function(){
    $('#region').on('change', my_handlers.fill_provinces);
    $('#province').on('change', my_handlers.fill_cities);
    $('#city').on('change', my_handlers.fill_barangays);

    $('#region').ph_locations({'location_type': 'regions'});
    $('#province').ph_locations({'location_type': 'provinces'});
    $('#city').ph_locations({'location_type': 'cities'});
    $('#barangay').ph_locations({'location_type': 'barangays'});

    $('#region').ph_locations('fetch_list');
});

// $(document).ready(function(){
//     var regionVal = 08;
//     $('#city_code').ph_locations({'location_type': 'cities'});
//     $('#city_code').ph_locations('fetch_list', [{"city_code": "083747"}]);
//     alert(regionVal);


   
// });

// $(document).ready(function() {
    
//     getRegion();

//     $('#region').change(function(){
//         getProvince();
//     });
//     $('#province').change(function(){
//         getCity();
//     });
// });

// function getRegion(){
//     $.ajax({
//         type: 'get',
//         url: 'https://psgc.gitlab.io/api/regions/',
//         success: function(data){       
//             data = JSON.parse(data); 
//             data.forEach(element => {
//                 $('#region').append('<option value="'+element.code+'">'+element.regionName+'</option>');
//             });
//             //getProvince(auth_token);
//         },  
//         error: function(error) {
//             console.log(error);
//         },
//         headers: {        
//             "Accept": "text/html" 
//         }
//     })
// }

// function getProvince(){
//     let region = $('#region').val();
//     $.ajax({
//         type: 'get',
//         url: 'https://psgc.gitlab.io/api/regions/'+region+'/provinces/',   
//         success: function(data){       
//             data = JSON.parse(data); 
//             data.forEach(element => {   
//                 $('#province').append('<option>'+element.name+'</option>');
//             });
//             //getProvince(auth_token);
//         },  
//         error: function(error) {
//             console.log(error);
//         },
//         headers: {        
//             "Accept": "text/html" 
//         }
//     })
// }
// function getCity(){
//     let region = $('#region').val();
//     $.ajax({
//         type: 'get',
//         url: 'https://psgc.gitlab.io/api/regions/'+region+'/cities-municipalities/',   
//         success: function(data){       
//             data = JSON.parse(data); 
//             data.forEach(element => {   
//                 $('#city').append('<option>'+element.name+'</option>');
//             });
//             //getProvince(auth_token);
//         },  
//         error: function(error) {
//             console.log(error);
//         },
//         headers: {        
//             "Accept": "text/html" 
//         }
//     })
// }
// function getBarangay(auth_token){
    
// }


function populate(s1, s2){
    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);

    s2.innerHTML = "";
    if(s1.value == "MIT"){
        var optionArray = ["MIT 501 Advanced Programming I|MIT 501 - Advanced Programming I", 
        "MIT 505 Advanced Data Structure and Algorithm|MIT 505 - Advanced Data Structure & Algorithm", 
        "MIT 506 Advanced Multimedia Communication|MIT 506 - Advanced Multimedia Communication"];
    }else if(s1.value == "MSIT"){
        var optionArray = ["MSIT 501 Advanced Programming I|MSIT 501 Advanced Programming I", 
        "MSIT 505 Advanced Data Structure & Algorithm|MSIT 505 Advanced Data Structure & Algorithm", 
        "MSIT 506 Advanced Multimedia Communication|MSIT 506 Advanced Multimedia Communication"];
    }
    
    for(var option in optionArray){
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
    }
}

function populate(s1, s2){
    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);

    s2.innerHTML = "";
    if(s1.value == "MIT"){
        var optionArray = ["MIT 501 Advanced Programming I|MIT 501 - Advanced Programming I", 
        "MIT 505 Advanced Data Structure and Algorithm|MIT 505 - Advanced Data Structure & Algorithm", 
        "MIT 506 Advanced Multimedia Communication|MIT 506 - Advanced Multimedia Communication"];
    }else if(s1.value == "MSIT"){
        var optionArray = ["MSIT 501 Advanced Programming I|MSIT 501 Advanced Programming I", 
        "MSIT 505 Advanced Data Structure & Algorithm|MSIT 505 Advanced Data Structure & Algorithm", 
        "MSIT 506 Advanced Multimedia Communication|MSIT 506 Advanced Multimedia Communication"];
    }
    
    for(var option in optionArray){
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
    }
}

function populateTwo(s2, s3){
    var s2 = document.getElementById(s2);
    var s3 = document.getElementById(s3);

    s3.innerHTML = "";
    if(s2.value == "MIT 501 Advanced Programming I" || s2.value == "MIT 505 Advanced Data Structure and Algorithm" || s2.value == "MIT 506 Advanced Multimedia Communication"){
        var optionArray = ["MIT 502 Methods of Research for IT|MIT 502 - Methods of Research for IT", 
        "MIT 507 System Analysis and Design|MIT 507 - System Analysis and Design"];
    }else if(s2.value == "MSIT 501 Advanced Programming I" || s2.value == "MSIT 505 Advanced Data Structure & Algorithm" || s2.value == "MSIT 506 Advanced Multimedia Communication"){
        var optionArray = ["MSIT 502 Methods of Research for IT|MSIT 502 Methods of Research for IT", 
        "MSIT 507 System Analysis and Design|MSIT 507 System Analysis and Design"];
    }
    
    for(var option in optionArray){
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s3.options.add(newOption);
    }
}

function populateThree(s3, s4){
    var s3 = document.getElementById(s3);
    var s4 = document.getElementById(s4);

    s4.innerHTML = "";
    if(s3.value == "MIT 502 Methods of Research for IT" || s3.value == "MIT 507 System Analysis and Design"){
        var optionArray = ["MIT 503 Statistics for IT Research|MIT 503 - Statistics for IT Research"];
    }else if(s3.value == "MSIT 502 Methods of Research for IT" || s3.value == "MSIT 507 System Analysis and Design"){
        var optionArray = ["MSIT 503 Statistics for IT Research|MSIT 503 - Statistics for IT Research"];
    }
    
    for(var option in optionArray){
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s4.options.add(newOption);
    }
}

