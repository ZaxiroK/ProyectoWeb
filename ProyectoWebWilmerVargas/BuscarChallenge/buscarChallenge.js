var localStorageKeyName = 'canchasRegistradas';
    
    loadFromLocalStorage();
FillCombo(); 

function FillCombo() 
    {
      var canchas= [],
          listaCanchas = localStorage.getItem(localStorageKeyName)
      var combo = document.getElementById("comboboxCanchas");
        
        if (listaCanchas !== null) {
            canchas = JSON.parse(listaCanchas);
        }
        
        //gridBody.innerHTML = '';
        canchas.forEach(function (x, i) {
                    var option = document.createElement('option');
      combo.options.add(option, i);
      combo.options[i].value = x.nombreCanchaG;
      combo.options[i].innerText = x.nombreCanchaG;
    });
                          }
                         

function getCanchasGuardadas(obj) {
        var canchas = [],
            listaCanchas = localStorage.getItem(localStorageKeyName);
        
        if (listaCanchas !== null) {
            canchas = JSON.parse(listaCanchas);
        }
        
        
        /*descripcion.push(obj);
        
        localStorage.setItem(localStorageKeyName, JSON.stringify(posts));
        
        loadFromLocalStorage();*/
    }

/*function loadFromLocalStorage() {
                var posts = [],
                    dataInLocalStorage = localStorage.getItem(localStorageKeyName),
                    gridBody = document.querySelector("#tblPost tbody");

                if (dataInLocalStorage !== null) {
                    posts = JSON.parse(dataInLocalStorage);
                }

                
                gridBody.innerHTML = '';
                
                posts.forEach(function (x, i) {
                    var tr = document.createElement("tr"),
                        tdDescripcion = document.createElement("td"),                        
                        tdEdit = document.createElement("td"),
                        btnEdit = document.createElement("button"),
                        tdRemove = document.createElement("td"),
                        btnRemove = document.createElement("button");
                        
                    
                    tdDescripcion.innerHTML = x.postMsj;
                                       
                    
                    btnEdit.className = 'update btn btn-warning btn-sm glyphicon glyphicon-pencil';
                    btnEdit.addEventListener('click', function() {
                       $(document).ready(function() {
                           $('#edit').modal('show');
                        });
                    });
                                        
                    btnRemove.className = 'delete btn btn-danger btn-sm glyphicon glyphicon-trash';
                    btnRemove.addEventListener('click', function() {                        
                         $(document).ready(function() {
                           $('#delete').modal('show');                             
                       
                             $("#del").click(function(){
                                removeFromLocalStorage(i);  
                            });
                        });
                        
                    });
                    
                    tdEdit.appendChild(btnEdit);
                    tdRemove.appendChild(btnRemove);
                    
                    tr.appendChild(tdDescripcion);                   
                    tr.appendChild(tdEdit);
                    tr.appendChild(tdRemove);
                                        
                    gridBody.appendChild(tr);
                });
            }