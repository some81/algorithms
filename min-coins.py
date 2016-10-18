def rec_coins(target,coins,known_results):
    #Default Value
    min_coins = target
    
    if target in coins:
        known_results[target] = 1
        return 1
        
    elif known_results[target] > 0:
        return known_results[target]
        
    else:
        for i in [c for c in coins if c <= target]:
            num_coins = 1 + rec_coins(target - i, coins, known_results)
            
            if num_coins < min_coins:
                min_coins = num_coins
                known_results[target] = min_coins
    
    return min_coins

target = 4
print(rec_coins(target, [1,2,3], [0]*(target+1)))

#best way to exchange coins
import math
def coins_exchange(amount,coins):
    change = {}
    coins = sorted(coins,reverse=True)
    for c in coins:
        change[c] = math.floor(amount/c)
        amount = amount % c
    return change

print(coins_exchange(4,[1,2,3]))

import sys
#all available exchange options
def change(n, coins_available, coins_so_far):
    if sum(coins_so_far) == n:
        yield coins_so_far
    elif sum(coins_so_far) > n:
        pass
    elif coins_available == []:
        pass
    else:
        for c in change(n, coins_available, coins_so_far+[coins_available[0]]):
            yield c
        for c in change(n, coins_available[1:], coins_so_far):
            yield c

n = 4
coins = [1, 2, 3]

solutions = [s for s in change(n, coins, [])]
for s in solutions:
    print(s)

print('optimal solution:', min(solutions, key=len))