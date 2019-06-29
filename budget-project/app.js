// BUDGET CONTROLER
var budgetController = (function () {
    // Creating function constructor for Expenses
    var Expense = function(id, description, value) {
        this.id = id;
        this.description = description;
        this.value = value;
        this.percentage = -1;
    }

    Expense.prototype.calcPercentage = function(totalIncome) {

        if(totalIncome > 0) {
        this.percentage = Math.round((this.value / totalIncome) * 100);
        } else {
            this.percentage = -1;
        }
    };

    Expense.prototype.getPercentage = function() {
    return this.percentage;
    };
   
    // Creating function constructor for Income
    var Income = function(id, description, value) {
        this.id = id;
        this.description = description;
        this.value = value;
    }

    var calculateTotal = function(type) {
        var sum = 0;
        data.allItems[type].forEach(function(cur){
            sum += cur.value;
        });
        data.totals[type] = sum;
    }

    var data = {
        allItems: {
            inc: [],
            exp: []
        },
        totals: {
            inc: 0,
            exp: 0
        },
        budget: 0,
        percentage: -1
    }

    return {
        addItem: function(type, des, val) {
            var newItem, ID;

            // Create new ID
            if(data.allItems[type].length > 0) {
                ID = data.allItems[type][data.allItems[type].length-1].id + 1;
            } else {
                ID = 0;
            }
            // Create new item based on inc or exp type
            if(type === 'exp') {
                newItem = new Expense(ID, des, val);
            }
            else if(type === 'inc') {
                newItem = new Income(ID, des, val);
            }

            // Push new item in array
            data.allItems[type].push(newItem);

            // Return the new element
            return newItem;
        },

        getBudget: function() {
            return {
                budget: data.budget,
                totalInc: data.totals.inc,
                totalExp: data.totals.exp,
                percentage: data.percentage
            }
        },

        deleteItem: function(type, id) {

            var ids, index;

            ids = data.allItems[type].map(function(current) {
                return current.id;
            });
            index = ids.indexOf(id);

            if(index !== -1) {
                data.allItems[type].splice(index, 1);
            }
        },
        
        calculateBudget: function() {
            // Calculate total income and expenses
            calculateTotal('exp');
            calculateTotal('inc');

            // Calculate the budget, income - expenses
            data.budget = data.totals.inc - data.totals.exp

            // Calculate percentage of income that we spent
            if(data.totals.inc > 0) {
            data.percentage = Math.round((data.totals.exp / data.totals.inc) * 100);
            } else {
                data.percentage = -1;
            }
        },

        calculatePercentages: function() {
            data.allItems.exp.forEach(function(cur) {
                cur.calcPercentage(data.totals.inc);
            });
        },

        getPercentages: function() {
            var allPercentages = data.allItems.exp.map(function(cur) {
                return cur.getPercentage();
            })
            return allPercentages;
        },

        testing: function() {
            console.log(data);
        }
    }

})();

// UI CONTROLER
var UIController = (function() {

    var DOMStrings = {
        inputType: '.add__type',
        inputDescription: '.add__description',
        inputValue: '.add__value',
        addBtn: '.add__btn',
        incomeContainer: '.income__list',
        expensesContainer: '.expenses__list',
        budgetLabel: '.budget__value',
        incomeLabel: '.budget__income--value',
        expenseLabel: '.budget__expenses--value',
        percentageLabel: '.budget__expenses--percentage',
        container: '.container',
        expensesPercLabel: '.item__percentage',
        dateLabel: '.budget__title--month'
    }

    var formatNumber = function(num, type) {
        var numSplit, int, dec, type;

        num = Math.abs(num);
        num = num.toFixed(2);
        numSplit = num.split('.');

        int = numSplit[0];

        if(int.length > 3) {
            int = int.substr(0, int.length - 3) + ',' + int.substr(int.length - 3, 3); /// 1000
        }
        dec = numSplit[1];

        return (type === 'exp' ? '-': '+') + '' + int + '.' + dec;
    };

    var nodeListForEach = function(list, callback) {
        for(var i = 0; i < list.length; i++) {
            callback(list[i], i);
        }
    };

    return {
        getInput: function() {
            return {
                type: document.querySelector(DOMStrings.inputType).value,
                description: document.querySelector(DOMStrings.inputDescription).value,
                value: parseFloat(document.querySelector(DOMStrings.inputValue).value)
            }
        },
        addListItem: function(obj, type) {
            var html, newHtml, element;

            // Create HTML string with placeholder text
            if(type === 'inc') {
                element = DOMStrings.incomeContainer;
                html = '<div class="item clearfix" id="inc-%id%"><div class="item__description">%description%</div><div class="right clearfix"><div class="item__value">%value%</div><div class="item__delete"><button class="item__delete--btn"><i class="ion-ios-close-outline"></i></button></div></div></div>'
            } else if(type === 'exp') {
                element = DOMStrings.expensesContainer;
                html = '<div class="item clearfix" id="exp-%id%"><div class="item__description">%description%</div><div class="right clearfix"><div class="item__value">%value%</div><div class="item__percentage">21%</div><div class="item__delete"><button class="item__delete--btn"><i class="ion-ios-close-outline"></i></button></div></div></div>';
            } 

            // Replace placeholder text with some actual data
            newHtml = html.replace('%id%', obj.id);
            newHtml = newHtml.replace('%description%', obj.description);
            newHtml = newHtml.replace('%value%', formatNumber(obj.value, type));

            // Insert HTML into DOM
            document.querySelector(element).insertAdjacentHTML('beforeend', newHtml);
        },

        deleteListItem: function(selectorID) {
            var el = document.getElementById(selectorID);
            el.parentNode.removeChild(el);
        },

        clearFields: function() {
            var fields, fieldsArray;

            fields = document.querySelectorAll(DOMStrings.inputDescription + ', ' + DOMStrings.inputValue);
            
            fieldsArray = Array.prototype.slice.call(fields);

            fieldsArray.forEach(function(currentValue, indexNumber, entireArray) {
                currentValue.value = "";
                
                fields[0].focus();
            });
        },

        displayBudget: function(obj) {
            var type;

            obj.budget > 0 ? type = 'inc': type = "exp";

            document.querySelector(DOMStrings.budgetLabel).textContent = formatNumber(obj.budget, type);
            document.querySelector(DOMStrings.incomeLabel).textContent = formatNumber(obj.totalInc, 'inc');
            document.querySelector(DOMStrings.expenseLabel).textContent = formatNumber(obj.totalExp, 'exp');
        
            if(obj.percentage > 0) {
                document.querySelector(DOMStrings.percentageLabel).textContent = obj.percentage + '%';
            } else {
                document.querySelector(DOMStrings.percentageLabel).textContent = '---';
            }
        },

        displayPercentages: function(percentages) {
            var fields = document.querySelectorAll(DOMStrings.expensesPercLabel);

            nodeListForEach(fields, function(current, index) {

                if(percentages[index] > 0) {
                    current.textContent = percentages[index] + '%';
                } else {
                    current.textContent = '---';
                } 
            });
        },

        displayMonth: function() {
            var now, year, months, month;

            now = new Date();

            months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            year = now.getFullYear();
            month = now.getMonth();

            document.querySelector(DOMStrings.dateLabel).textContent = months[month] + ' ' + year;
        },

        changedType: function() {
            
            var fields = document.querySelectorAll(
                DOMStrings.inputType + ',' +
                DOMStrings.inputDescription + ',' +
                DOMStrings.inputValue
            ); // this will return node list

            nodeListForEach(fields, function(cur) {
                cur.classList.toggle('red-focus')
            });

            document.querySelector(DOMStrings.addBtn).classList.toggle('red');
        },

        getDOMStrings: function() {
            return DOMStrings;
        }
        };
})();

// GLOBAL APP CONTROLER
var controller = (function(budgetCtrl, UICtrl) {
    var setupEventListeners = function() {
        var DOM = UICtrl.getDOMStrings();
        document.querySelector(DOM.addBtn).addEventListener('click', ctrlAddItem); 
        document.addEventListener('keypress', function(event) {
            if(event.keyCode === 13 || event.which === 13) {
            ctrlAddItem();
        }
    });

    document.querySelector(DOM.container).addEventListener('click', ctrlDeleteItem);
    document.querySelector(DOM.inputType).addEventListener('change', UICtrl.changedType);
    };

    var updateBudget = function() {
        // Calculate the budget
        budgetCtrl.calculateBudget();

        // Return the budget
        var budget = budgetCtrl.getBudget();
        console.log(budget);

        // Display the budget on the UI
        UICtrl.displayBudget(budget);
    };

    var updatePercentages = function() {
        
        // Calculate the percentages
        budgetCtrl.calculatePercentages();

        // Read them from the budget controller
        var percentages = budgetCtrl.getPercentages();

        // Update the interface
        UICtrl.displayPercentages(percentages);
    };

    var ctrlDeleteItem = function(event) {
        var idemID, splitID, type, ID;

        itemID = event.target.parentNode.parentNode.parentNode.parentNode.id;

        if(itemID) {
            splitID = itemID.split('-');
            type = splitID[0];
            ID = parseInt(splitID[1]);

            // Delete item from the data structure
            budgetCtrl.deleteItem(type, ID);

            // Delete item from the user interface
            UICtrl.deleteListItem(itemID)

            // Update and show the new budget
            updateBudget();

            // Calculate and update percentages
             updatePercentages();
        }
    }

    var ctrlAddItem = function() {

        var item, newItem;

        // Get the field input data
        input = UICtrl.getInput();

        if(input.description !== "" && !isNaN(input.value) && input.value > 0) {

            // Add element to the budget controller
            newItem = budgetCtrl.addItem(input.type, input.description, input.value)
        
            // Add item to the UI
            UICtrl.addListItem(newItem, input.type);

            // Clear the fields
            UICtrl.clearFields();

            // Calculate and update budget
            updateBudget();

            // Calculate and update percentages
            updatePercentages();
        }
    };

    return {
        init: function() {
            console.log('Application has started!');
            UICtrl.displayMonth();
            UICtrl.displayBudget({
                budget: 0,
                totalInc: 0,
                totalExp: 0,
                percentage: 0
            });
            setupEventListeners();
        }
    }
})(budgetController, UIController);

controller.init();

