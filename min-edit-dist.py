def  minEditDistR(target, source):
   """ Minimum edit distance. Straight from the recurrence. """

   i = len(target); j = len(source)

   if i == 0:  return j
   elif j == 0: return i

   return(min(minEditDistR(target[:i-1],source)+1,
              minEditDistR(target, source[:j-1])+1,
              minEditDistR(target[:i-1], source[:j-1])+substCost(source[j-1], target[i-1])))

def substCost(x,y):
    if x == y: return 0
    else: return 1

print(minEditDistR('alex','xlex'))


def levenshtein(s1, s2):
    if len(s1) < len(s2):
        return levenshtein(s2, s1)

    # len(s1) >= len(s2)
    if len(s2) == 0:
        return len(s1)

    previous_row = range(len(s2) + 1)
    for i, c1 in enumerate(s1):
        current_row = [i + 1]
        for j, c2 in enumerate(s2):
            insertions = previous_row[j + 1] + 1 # j+1 instead of j since previous_row and current_row are one character longer
            deletions = current_row[j] + 1       # than s2
            substitutions = previous_row[j] + (c1 != c2)
            current_row.append(min(insertions, deletions, substitutions))
        previous_row = current_row
    
    return previous_row[-1]

print(levenshtein('ab','ae'))