const addRoleInput = document.querySelector(".add-role__input")
const addButton = document.querySelector(".add_role__btn")
const selectRole = document.getElementById("role")

if(addRoleInput && addButton && selectRole) {
    addButton.addEventListener("click", (e) => {
        e.preventDefault()
        const opt1 = document.createElement("option");
        
        opt1.value = `role_${addRoleInput.value}`;
        opt1.text = addRoleInput.value
    
        selectRole.add(opt1, null)
        addRoleInput.value = ""
    })
} else {
    console.log("Elems not found")
}
