// Define the customIncludes function
function customIncludes(array, valueToFind, fromIndex = 0) {
    // Convert fromIndex to an integer and ensure it is within the array bounds
    fromIndex = Math.floor(fromIndex);

    // Handle negative fromIndex
    if (fromIndex < 0) {
        fromIndex = Math.max(array.length + fromIndex, 0);
    }

    // Loop through the array starting from fromIndex
    for (let i = fromIndex; i < array.length; i++) {
        // Check for strict equality
        if (array[i] === valueToFind) {
            return true;
        }
    }

    // If the value is not found, return false
    return false;
}

// Example usage
const myArray = [1, 2, 3, 4, 5];

console.log(customIncludes(myArray, 3));    // Outputs: true
console.log(customIncludes(myArray, 6));    // Outputs: false
console.log(customIncludes(myArray, 2, 2)); // Outputs: false (search starts from index 2)
console.log(customIncludes(myArray, 4, -3)); // Outputs: true (negative index means search from end)









  





