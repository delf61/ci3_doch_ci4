import requests

def test():
    base_url = "http://localhost:8080"

    # Send a dummy POST request to simulate submitting the login form so it doesn't fail on missing form validation data or redirects trying to loop back
    print("Testing /login endpoint")
    res = requests.post(f"{base_url}/login", data={"username": "test", "password": "123"})
    print(f"Login page status: {res.status_code}")
    print(res.text[:100])

if __name__ == "__main__":
    test()
