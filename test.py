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