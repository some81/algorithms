#find duplicates in array
def find_duplicates(arr):
    dup_arr = arr[:]
    for i in set(arr):
        dup_arr.remove(i)
    
    return list(set(dup_arr))   

print(find_duplicates([1,2,2,3,4,4]))