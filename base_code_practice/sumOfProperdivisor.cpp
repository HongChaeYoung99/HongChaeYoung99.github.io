#include <iostream>
using namespace std;

int main(void)
{
	int n, i, sum = 1;
	cin >> n;
	cout << "1";
	for (i = 2; i < (n / 2 +1)  ; i++)
	{
		if (n % i == 0) {
			sum += i;
			cout << " + " << i;
		}
	}
	cout << " = " << sum;
	
	return 0;
}
