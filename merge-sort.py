import sys
arr = [3,5,2,10];
print arr

def mergeSort(arr):
    mid = len(arr)//2
    
    if len(arr) <= 2:
        return arr
    
    left = mergeSort(arr[:mid])
    right = mergeSort(arr[mid:])
    
    return merge2(left,right)

def merge(left,right):
    print left, right
    
    if not left:
        return right
    if not right:
        return left
    if left[0] < right[0]:
        return [left[0]] + merge(left[1:], right)
    return [right[0]] + merge(left, right[1:])

def merge2(left,right):
    res = []
    while 0 < len(left) and 0 < len(right):
        if left[0] > right[0]:
            res.append(right[0])
            right.pop(0)
        else:
            res.append(left[0])
            left.pop(0)
    while(len(left) > 0):
        res.append(left[0])
        left.pop(0)
    while(len(right) > 0):
        res.append(right[0])
        right.pop(0)
    
    return res

print mergeSort(arr)
