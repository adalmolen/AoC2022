arrayequals = []
with open("rucksack.txt","r") as f:
    data = f.readlines()

for value in data:
    wholeString = [*value]
    wholeString.pop()
    length = (len(wholeString))/2
    intlength = int(length)
    string1 = wholeString[:intlength]
    string2 = wholeString[intlength:]
    for value in string1:
        if(value in string2):
            arrayequals.append(value)
            break
pointsarray = []
for val in arrayequals:
    if(val.isupper() == True):
        point = ord(val) - 65 + 27
        pointsarray.append(point)
    if(val.islower() == True):
        point = ord(val) - 97 + 1
        pointsarray.append(point)
 
print(sum(pointsarray))