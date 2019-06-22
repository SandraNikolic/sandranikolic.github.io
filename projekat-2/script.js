if (!localStorage.getItem("task")) {
  arrayX = [];
} else {
  arrayX = localStorage.getItem("task").split(",");
}


function newNote() {
  let note = document.tasksLi.newNotee;

  if (note.value !== "") {
    arrayX.push(note.value);
    localStorage.setItem("task", arrayX);
    writeNote();
    note.value = "";
  } else {
    alert("Write something");
  }
}


function writeNote() {
  document.getElementById("allNotes").innerHTML = "";

  if (typeof(Storage) !== "undefined") {
    for (let i = 0; i < arrayX.length; i++) {
      let setOfNotes = document.createElement("div");
      setOfNotes.className = "oneNote";
      let noteElement = document.createElement("p");
      let tasksContent = document.createTextNode(arrayX[i]);
      noteElement.appendChild(tasksContent);
      setOfNotes.appendChild(noteElement);
      let deleteNote = document.createElement("clearButton");
      deleteNote.className = "fas fa-times";
      deleteNote.title = "Delete this task";
      deleteNote.setAttribute("onclick", "deleteTask(event)");
      setOfNotes.appendChild(deleteNote);
      document.getElementById("allNotes").appendChild(setOfNotes);
      document.tasksLi.newNotee.value = "";
    }
  } 
  else {
    alert("Your browser doesn't support Web Storage");
  }
}


function filterSearch() {
  let filterNote = document.filterForm.textFilter.value.toUpperCase();
  let notesAll = document.getElementById("allNotes").getElementsByTagName("DIV");

  for (let i = 0; i < notesAll.length; i++) {
    let all = notesAll[i].querySelector("p");
    if (all.innerHTML.toUpperCase().indexOf(filterNote) > -1) {
      notesAll[i].style.display = "flex";
    } else {
      notesAll[i].style.display = "none";
    }
  }
}


function clearTasks() {
  let setOfNotes = document.getElementById("allNotes");

  if (setOfNotes.innerHTML !== "" && confirm("Are you sure that you want delete all notes?")) {
    localStorage.removeItem("task");
    arrayX = [];
    setOfNotes.innerHTML = "";
    document.filterForm.textFilter.value = "";
  }
}


function deleteTask(event) {
  if (confirm("Are you sure that you want delete this note?")) {
    let noteParent = event.target.parentElement;

    for (let i = 0; i < arrayX.length; i++) {
      if (noteParent.querySelector("p").innerHTML === arrayX[i]) {
        arrayX.splice(i, 1);
        localStorage.setItem("task", arrayX);
      }
    }
    noteParent.remove();
    writeNote();
  }
}


window.onload = writeNote;