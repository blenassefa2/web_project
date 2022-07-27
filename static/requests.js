const postrequest = (data, url) =>
{
    
    var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = 'post';
    form.action = url;
    // form.target="_blank";

    for (var name in data) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = data[name];
        form.appendChild(input);
    }
    form.submit();
    document.body.removeChild(form);
    
};


function more_detail(x){
    data = {
    ID : x.id
    
    }
    console.log(x)
    postrequest(data, 'detail.php');
}
function more(x){
    data = {
    ID : x
    
    }
    console.log(x)
    postrequest(data, 'detail.php');
}
function addrating(x,inr){
    data = {
        id :x,
        i:inr
    }
    console.log(x)
    postrequest(data, 'created.php');
}

function  sort_by_tag(){
    _location = document.getElementById("1");
    reason = document.getElementById("2");
    rate = document.getElementById("rating");
    console.log(rate,_location,reason);
    data ={
        rating: rate.value,
        location: _location.value,
        reasoning: reason.value
    }

    postrequest(data, 'index.php#maintags');

}
function search(id){
    y = document.getElementById(id);
    data={
        name: y.value
    }

    postrequest(data, 'index.php#maintags')
}