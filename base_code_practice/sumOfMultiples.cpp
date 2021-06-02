#include <iostream>
using namespace std;

int main(void)
{
	int a, b;
	cin >> a >> b;
	int sum = 0;
	for(int i = 1 ; i <= a ; i++)
	{
		if(i % b == 0)
			sum += i;
	}
	cout << sum;
	
	return 0;
}
