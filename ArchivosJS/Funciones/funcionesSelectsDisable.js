
function toggleSelectTipoId() {
  var checkbox = document.getElementById("activarTipoId");
  var select = document.getElementById("tipoIdSelect");
  if (checkbox.checked) {
    select.disabled = false;
  } else {
    select.disabled = true;
    updateHiddenInputTipoId(select); // Utiliza la función específica para el tipo de identificación
  }
}

function toggleSelectRol(checkbox) {
  var select = document.getElementById("rolSelect");
  if (checkbox.checked) {
    select.disabled = false;
  } else {
    select.disabled = true;
    updateHiddenInputRol(select);
  }
}

function toggleSelectTipoElemento(checkbox) {
  var select = document.getElementById("tipoelemento");
  if (checkbox.checked) {
    select.disabled = false;
  } else {
    select.disabled = true;
    updateHiddenInputTipoElemento(select);
  }
}


//Enviar valores del select del tipo de identificación si el usuario no activa las opciones
function updateHiddenInputTipoId(select) {
  var hiddenInput = document.getElementById("Tipo_id_hidden");
  hiddenInput.value = select.value;
}

//Enviar valores del select del rol si el usuario no activa las opciones
function updateHiddenInputRol(select) {
  var hiddenInput = document.getElementById("Rol_hidden");
  hiddenInput.value = select.value;
}

function updateHiddenInputTipoElemento(select) {
  var hiddenInput = document.getElementById("tipo_Elemento_Hidden");
  hiddenInput.value = select.value;
}