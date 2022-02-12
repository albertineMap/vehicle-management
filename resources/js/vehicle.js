$(async function(){

    /**
     * get info for a vehicle with the vin from api vpic.nhtsa.dot.gov/api
     */
    $("#btn_find_vehicle").on("click", function(event){
        event.preventDefault();
        let vin = $('#vin').val();

        $.get('https://vpic.nhtsa.dot.gov/api/vehicles/decodevin/'+vin+'?format=json')
        .done(function(data){
            let results = data.Results;
            let fields = [
                {"id": "make", "value":  results.find(e=> e.Variable== 'Make').Value},
                {"id": "model", "value":  results.find(e=> e.Variable== 'Model').Value},
                {"id": "model_year","value":  results.find(e=> e.Variable== 'Model Year').Value},
                {"id": "trim","value":  results.find(e=> e.Variable== 'Trim').Value},
                {"id": "body_class","value":  results.find(e=> e.Variable== 'Body Class').Value},
                {"id": "vehicle_type","value":  results.find(e=> e.Variable== 'Vehicle Type').Value},
                {"id": "driver_type","value":  results.find(e=> e.Variable== 'Drive Type').Value},
                {"id": "fuel_type_primary","value":  results.find(e=> e.Variable== 'Fuel Type - Primary').Value},
            ]

            fields.forEach(element => {
                if(element.value){
                    document.getElementById(element.id).value =element.value;
                }
            });
        })
    })
})
