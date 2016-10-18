def rec_bin_search(arr,elem):
    if len(arr) == 0:
        return False
    else:
        mid = len(arr) // 2

        if arr[mid] == elem:
            return True
        else:
            if elem < arr[mid]:
                return rec_bin_search(arr[:mid],elem)
            else:
                return rec_bin_search(arr[mid + 1:],elem)

def bin_search(arr,elem):
    first = 0
    last = len(arr)-1
    found = False

    while first <= last and not found:
        mid = (first+last)//2

        if(arr[mid] == elem):
            return True
        else:
            if arr[mid] > elem:
                last = mid - 1
            else:
                first = mid + 1
    return found

arr = [1,2,3,4,5,6,7,8,9,10]
print(bin_search(arr,7)) 
