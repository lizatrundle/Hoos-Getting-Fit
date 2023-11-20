# implementing RSA algorithm with python 
# cs 3710 programming assignment 2 
# liza trundle 

import random
import math

def rsa_algorithm(message):
    # input = message 
    # output prints p, q, e,d and encrypted message and decrypted message 

    def generate_prime():
        # helper function to generate a large prime -- p and q values
        while True:
            p = random.randint(10**6, 10**7)
            if is_prime(p):
                return p


    def is_prime(n):
        # helper function to determine if a number is prime
        if n <= 1:
            return False
        for i in range(2, int(n**0.5) + 1):
            if n % i == 0:
                return False
        return True
    
    
    # main rsa function -- defining variables 
    p, q= generate_prime(), generate_prime()
    n = p * q
    phi = (p-1)*(q-1)
    e = 2
    
    # getting public key e
    while e < phi:
        if math.gcd(e, phi) == 1:
            break
        else:
            e += 1
    # getting private key d 
    d = pow(e, -1, phi)

    # encrypt the message : have to deal with string values 

    encrypted = [pow(ord(char), e, n) for char in message]

    # decrypt the message
    decrypted = ''.join([chr(pow(char, d, n)) for char in encrypted])

    return "p: " + str(p) + "\nq: " + str(q) + "\ne: " + str(e) + "\nd: " + str(d) + "\nEncrypted message: " + str(encrypted) + "\nDecrypted message: " + str(decrypted)


if __name__ == "__main__":
    print("Enter message to encrypt: ")
    message = input()
    print(rsa_algorithm(message))
