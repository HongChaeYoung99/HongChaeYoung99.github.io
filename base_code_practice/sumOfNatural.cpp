#include <iostream>
using namespace std;

int main(void)
{
	int n1, n2, sum, i;
	sum = 0;
	i = 0;
	cin >> n1 >> n2;
	for (i = n1; i < n2 ; i++)
	{
		sum += i;
		cout << i << " + ";
	}
	sum += i;
	cout << i << " = " << sum;
	
	return 0;
}
