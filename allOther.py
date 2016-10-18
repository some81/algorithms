def get_products_of_all_ints_except_at_index(int_list):

    # we make a list with the length of the input list to
    # hold our products
    products_of_all_ints_except_at_index = {}
    
    # for each integer, we find the product of all the integers
    # before it, storing the total product so far each time
    product_so_far = 1
    for i in range(len(int_list)):
        products_of_all_ints_except_at_index[i] = product_so_far
        product_so_far *= int_list[i]
    
    # for each integer, we find the product of all the integers
    # after it. since each index in products already has the
    # product of all the integers before it, now we're storing
    # the total product of all other integers
    product_so_far = 1
    for i in reversed(range(len(int_list))):
        products_of_all_ints_except_at_index[i] *= product_so_far
        product_so_far *= int_list[i]
        
    return products_of_all_ints_except_at_index


print(get_products_of_all_ints_except_at_index([1, 7, 3, 4]))